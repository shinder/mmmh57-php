<?php

require __DIR__. '/__connect_db.php';


$stmt = $pdo->query("SELECT * FROM address_book");

$rows = $stmt->fetchAll();

echo json_encode($rows);
