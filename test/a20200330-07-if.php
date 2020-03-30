<?php
    $age = isset($_GET['age']) ? intval($_GET['age']) : 0;
?>
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
    if($age>=18){
        echo 'welcome<br>';
    } else {
        echo 'nono<br>';
    }
?>
<?php if($age>=18){ ?>
    kjdkadjfk
    kldkdjgk
    <h2>18</h2>
<?php } else { ?>
    kjdkadjfk
    kldkdjgk
    <h2>17</h2>
<?php }  ?>
</body>
</html>