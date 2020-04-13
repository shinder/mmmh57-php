<?php
require __DIR__. '/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM categories");

//echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script>
    let ori_cates = <?= json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE) ?>;


</script>
</body>
</html>






