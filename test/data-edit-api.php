<?php
require __DIR__ . '/__connect_db.php';

// 回應的資料類型為 JSON
header('Content-Type: application/json');
// mime type 預設為 text/html
// jpg 檔的 mime type ?

$output = [
    'success' => false,
    'error' => '欄位資料不足',
    'code' => 0,
    'postData' => $_POST
];

if(isset($_POST['name']) and isset($_POST['mobile'])) {
    // TODO: 欄位資料檢查

    // 檢查 Email 是否重複
    $e_sql = "SELECT 1 FROM address_book WHERE email=?";
    $e_stmt = $pdo->prepare($e_sql);
    $e_stmt->execute([$_POST['email']]);

    if( $e_stmt->rowCount() ){
        $output['error'] = 'Email 重複了';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 檢查手機號碼格式
    $mobile_re = "/^09\d{2}-?\d{3}-?\d{3}$/";
    if(empty(preg_grep($mobile_re, [ $_POST['mobile']]))){
        $output['error'] = '手機號碼格式不符';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }


    $sql = "INSERT INTO `address_book`(
`name`, `email`, `mobile`, `birthday`, `address`, `created_at`
) VALUES (?, ?, ?, ?, ?, NOW())";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        $_POST['birthday'],
        $_POST['address'],
    ]);

    if($stmt->rowCount()==1){
        $output['success'] = true;
        $output['error'] = '';
    } else {
        $output['error'] = '資料無法新增';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);