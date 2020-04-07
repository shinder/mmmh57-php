<?php

require __DIR__. '/__connect_db.php';


$stmt = $pdo->query("SELECT * FROM address_book");

$row = $stmt->fetch();

print_r($row);
