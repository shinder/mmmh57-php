<?php

require __DIR__ . '/__connect_db.php';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$sql = "DELETE FROM `address_book` WHERE `sid`=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([ $sid  ]);
/*
echo json_encode([
    'rowCount' => $stmt->rowCount()
]);
*/
header('Location: data-list.php');
