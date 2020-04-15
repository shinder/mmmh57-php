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

// 分類資料
$c_sql = "SELECT * FROM categories WHERE parent_sid=0";
$cates = $pdo->query($c_sql)->fetchAll();


?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
<div class="row">
    <div class="col-md-3">
        <!-- 分類選單 -->
        <div class="btn-group-vertical" style="width: 100%">
            <a type="button" href="" class="btn btn-outline-primary">所有商品</a>
            <?php foreach($cates as $c): ?>
            <a type="button" href="" class="btn btn-outline-primary"><?= $c['name'] ?></a>
            <?php endforeach; ?>
        </div>



    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item <?= $page==1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page-1 ?>">
                                <i class="fas fa-arrow-circle-left"></i>
                            </a>
                        </li>
                        <?php for($i=1; $i<=$totalPages; $i++): ?>
                            <li class="page-item <?= $i===$page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?= $page==$totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page+1 ?>">
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <?php foreach($rows as $r): ?>
            <div class="col-md-3">
                <div class="card" >
                    <img src="imgs/small/<?= $r['book_id'] ?>.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title"><?= $r['bookname'] ?></h6>
                        <p class="card-text"><i class="fas fa-user-secret"></i> <?= $r['author'] ?></p>
                        <p class="card-text"><i class="fas fa-dollar-sign"></i> <?= $r['price'] ?></p>
                        <form>
                            <div class="form-group">
                                <select class="form-control" style="display: inline-block; width: auto">
                                    <?php for($i=1; $i<=10; $i++){ ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>
                                <button type="button" class="btn btn-primary"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </form>
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