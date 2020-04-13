<?php
require __DIR__. '/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM categories");
$rows = $stmt->fetchAll();
$my_cates = [];

foreach($rows as $k=>$v){
    if($v['parent_sid']=='0'){
        $my_cates[] = $v;
    }
}

foreach($my_cates as $k1=>$v1){
    foreach($rows as $k2=>$v2){
        if($v2['parent_sid']==$v1['sid']){
            $my_cates[$k1]['children'][] = $v2;
        }
    }
}

echo json_encode($my_cates, JSON_UNESCAPED_UNICODE);






