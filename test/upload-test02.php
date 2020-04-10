<?php
$uploads = __DIR__. '/uploads/';

$output = [
    'files' => [],
    'errors' => []
];

if(!isset($_FILES['myfiles']) or !isset($_FILES['myfiles']['name'])){
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

foreach($_FILES['myfiles']['name'] as $k=>$v){
    $ext = '';
    switch($_FILES['myfiles']['type'][$k]){
        case 'image/jpeg':
            $ext = '.jpg';
            break;
        case 'image/png':
            $ext = '.png';
    }

    if(empty($ext)){
        $output['errors'][] = [
            'name' => $v,
            'info' => '檔案格式不符',
        ];
    } else {
        $filename = md5(uniqid(). $v);
        $filename .= $ext;
        $output['files'][] = [
            'name' => $v,
            'newname' => $filename,
        ];

        // 搬移檔案
        move_uploaded_file($_FILES['myfiles']['tmp_name'][$k], $uploads. $filename );
    }


}








echo json_encode($output, JSON_UNESCAPED_UNICODE);



