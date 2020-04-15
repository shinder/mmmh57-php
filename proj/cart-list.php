<?php
require __DIR__. '/__connect_db.php';

$pKeys = array_keys($_SESSION['cart']);
if(!empty($pKeys)) {
    $sql = sprintf("SELECT * FROM products WHERE sid IN(%s)", implode(',', $pKeys));
    $rows = $pdo->query($sql)->fetchAll();
}

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
<div class="row">
    <div class="col">
    <pre>
        <?php print_r($rows) ?>

    </pre>
    </div>

</div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>