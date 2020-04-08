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
            <form method="post">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <small id="nameHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="mobile">mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" required>
                    <small id="mobileHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="birthday">birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday">
                    <small id="birthdayHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                    <small id="addressHelp" class="form-text text-muted"></small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>

<?php include __DIR__ . '/parts/html-foot.php'; ?>