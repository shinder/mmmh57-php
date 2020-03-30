<?php

// 查看 a 的 query string 參數有沒有設定，有設定的話就使用它的值
// 沒有設定的話， $a 就設定為 0
$a = isset($_GET['a']) ? intval($_GET['a']) : 0;
$b = isset($_GET['b']) ? intval($_GET['b']) : 0;

echo $a + $b;
echo '<br>';

echo '<table><tr>';
for($i=1; $i<=$a; $i++){
    echo "<td>$i</td>";
}
echo '</tr></table>';


echo '<table>';
for($i=1; $i<=$a; $i++){
    echo "<tr><td>$i</td></tr>";
}
echo '</table>';
