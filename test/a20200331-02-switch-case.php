<?php
$s = isset($_GET['s']) ? intval($_GET['s']) : 0;
?>
<form action="" method="get">
    <input type="number" name="s" value="<?= $s ?>">
    <input type="submit" value="SUBMIT">
</form>
<?php
if($s>=90){
    $g = 'A';
} elseif($s>=80){
    $g = 'B';
} elseif($s>=70){
    $g = 'C';
} elseif($s>=60){
    $g = 'D';
} else {
    $g = 'F';
}


echo $g;

