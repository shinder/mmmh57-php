<?php
//require __DIR__ . '/__connect_db.php';
//
//$perPage = 5;
//$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
//
//// 取得總筆數
//$totalRows = $pdo->query("SELECT COUNT(1) FROM `address_book`")
//    ->fetch(PDO::FETCH_NUM)[0];
//
//// 算總頁數
//$totalPages = ceil($totalRows / $perPage);
//
//
//// exit; // 立刻結束程式
//// die('aaaa'); // 立刻結束程式
//
//$sql = sprintf("SELECT * FROM `address_book` LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
//
//
//$stmt = $pdo->query($sql);

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>

<?php include __DIR__ . '/parts/html-foot.php'; ?>