<?php
require __DIR__. '/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM categories");



echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);






