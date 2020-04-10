<?php
$uploads = __DIR__. '/uploads/';

$output = [
    'newname' => '',
    'name' => '',
    'error' => '沒有上傳檔案'
];

if(!isset($_FILES['myfiles']) or !isset($_FILES['myfiles']['name'])){
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$ext = '';
switch($_FILES['myfiles']['type']){
    case 'image/jpeg':
        $ext = '.jpg';
        break;
    case 'image/png':
        $ext = '.png';
}

if(empty($ext)){
    $output['error'] = '檔案格式不符';
} else {
    $filename = md5(uniqid(). $_FILES['myfiles']['name']);
    $filename .= $ext;
    $output['newname'] = $filename;
    $output['name'] = $_FILES['myfiles']['name'];
    // 搬移檔案
    move_uploaded_file($_FILES['myfiles']['tmp_name'], $uploads. $filename );
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);



