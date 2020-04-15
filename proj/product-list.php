<?php
require __DIR__. '/__connect_db.php';
$perPage = 4;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// 總筆數
$t_sql = "SELECT COUNT(1) FROM products ";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

$totalPages = ceil($totalRows/$perPage); // 總頁數
if($page<1) $page=1;
if($page>$totalPages) $page=$totalPages;

$rows = [];
// 如果有資料
if($totalRows>0){
    $sql = sprintf("SELECT * FROM products LIMIT %s, %s", ($page-1)*$perPage, $perPage);
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
<div class="row">
    <div class="col-md-3">
        <!-- 分類選單 -->
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col">

            </div>
        </div>
        <div class="row">
            <?php foreach($rows as $r): ?>
            <div class="col-md-3">
                <div class="card" >
                    <img src="imgs/small/<?= $r['book_id'] ?>.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $r['bookname'] ?></h5>
                        <p class="card-text"><?= $r['author'] ?></p>

                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>

<?php include __DIR__ . '/parts/html-foot.php'; ?>