<?php
require __DIR__. '/__connect_db.php';
$output = [
    'success' => false,
    'post' => $_POST,
];

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if(empty($email) or empty($password)){
    echo json_encode($output);
    exit;
}

$sql = "SELECT * FROM members WHERE email=? AND password=SHA1(?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $password]);

if($stmt->rowCount()){
    $row = $stmt->fetch();
    $_SESSION['loginUser'] = $row;
    $output['success'] = true;
    $output['data'] = $row;
}
header('Content-Type: application/json');
echo json_encode($output);






