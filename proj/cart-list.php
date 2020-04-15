<?php
require __DIR__. '/__connect_db.php';

$pKeys = array_keys($_SESSION['cart']);

$rows = []; // 預設值
$data_ar = []; // dict

if(!empty($pKeys)) {
    $sql = sprintf("SELECT * FROM products WHERE sid IN(%s)", implode(',', $pKeys));
    $rows = $pdo->query($sql)->fetchAll();

    foreach($rows as $r){
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $data_ar[$r['sid']] = $r;
    }
}

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
<div class="row">
    <div class="col">
        <?php foreach($_SESSION['cart'] as $sid=>$qty): ?>
            <p><?= $sid. ' - '. $data_ar[$sid]['bookname'] ?></p>
            <p><?= $data_ar[$sid]['quantity'] ?></p>
            <hr>
        <?php endforeach; ?>
    </div>

</div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>