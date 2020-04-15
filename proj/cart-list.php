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
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">del</th>
                <th scope="col">封面</th>
                <th scope="col">書名</th>
                <th scope="col">價格</th>
                <th scope="col">數量</th>
                <th scope="col">小計</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['cart'] as $sid=>$qty): 
                $item = $data_ar[$sid];
                ?>
            <tr data-sid="<?= $sid ?>">
                <td>del</td>
                <td><img src="imgs/small/<?= $item['book_id'] ?>.jpg" alt=""></td>
                <td><?= $item['bookname'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= $item['price']*$item['quantity'] ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>

</div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>