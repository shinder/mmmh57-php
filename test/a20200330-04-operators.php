<?php

$a = 12;

$b = 10;

echo ($a > $b) ? '真' : '假';
echo '<br>';

echo $a < $b ? 'true' : 'false';
echo '<br>';

$b = '';

echo $b ?: 'false'; // 如果 $b 是 true 就輸出 $b
// 如果 $b 是 false, 就輸出 'false'



