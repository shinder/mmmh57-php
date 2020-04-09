<?php
require __DIR__ . '/__connect_db.php';

$output = [
    'success' => false,
    'error' => '欄位資料不足',
    'code' => 0,
];

if(isset($_POST['name']) and isset($_POST['mobile'])) {
    // TODO: 欄位資料檢查




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