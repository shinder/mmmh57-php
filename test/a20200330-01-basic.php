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

echo PHP_VERSION. '<br>';
echo __DIR__. '<br>'; // 所在的資料夾
echo __FILE__. '<br>'; // 檔案的實體位置（包含路徑）

echo __LINE__. '<br>'; // 行數（列數）

define('MY_CONST', 3000);

echo MY_CONST. '<br>'; // 常數不能再設定值給它
echo FALSE. '<br>'; // 布林值不區分大小寫 // 輸出到頁面為空字串
echo true. '<br>'; // 輸出到頁面為 '1'

?>
</body>
</html>
