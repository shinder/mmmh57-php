<?php
$a = isset($_POST['a']) ? intval($_POST['a']) : 0;
$b = isset($_POST['b']) ? intval($_POST['b']) : 0;

$output = [
    'a' => $a,
    'b' => $b,
    'c' => $a+$b,
];

echo json_encode($output);

