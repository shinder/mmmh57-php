<?php
require __DIR__ . '/__connect_db.php';

if(isset($_POST['name']) and isset($_POST['mobile'])) {

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
        $success = true;
    } else {
        $success = false;
    }
}
