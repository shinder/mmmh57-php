<?php
require __DIR__. '/__connect_db.php';

$pKeys = array_keys($_SESSION['cart']);

$rows = []; // 預設值
$data_ar = []; // dict

// 有登入才能結帳
if(! isset($_SESSION['loginUser'])){
    header('Location: product-list.php');
    exit;
}

if(!empty($pKeys)) {
    $sql = sprintf("SELECT * FROM products WHERE sid IN(%s)", implode(',', $pKeys));
    $rows = $pdo->query($sql)->fetchAll();
    $total = 0;
    foreach($rows as $r){
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $data_ar[$r['sid']] = $r;
        $total += $r['quantity'] * $r['price'];
    }
} else {
    header('Location: product-list.php');
    exit;
}

$o_sql = "INSERT INTO `orders`(`member_sid`, `amount`, `order_date`) VALUES (?, ?, NOW())";
$o_stmt = $pdo->prepare($o_sql);
$o_stmt->execute([
    $_SESSION['loginUser']['id'],
    $total,
]);

$order_sid = $pdo->lastInsertId(); // 最近新增資料的 PK





?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
    <div class="alert alert-success" role="alert">
        感謝訂購 <?= $order_sid ?>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>

<?php include __DIR__ . '/parts/html-foot.php'; ?>