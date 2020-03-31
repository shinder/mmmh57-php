<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

$ar1 = [
    'name' => 'Flora',
    'age' => 26,
    'gender' => 'female',
    'id' => 'A26789',
];

foreach($ar1 as $k => $v){
    echo "$k =&gt; $v <br>";
}


?>

</body>
</html>