<?php
require __DIR__ . '/__connect_db.php';

if(isset($_POST['name']) and isset($_POST['mobile'])) {

    $sql = "INSERT INTO `address_book`(
`name`, `email`, `mobile`, `birthday`, `address`, `created_at`
) VALUES (?, ?, ?, ?, ?, NOW())";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        $_POST['birthday'],
        $_POST['address'],
    ]);


    echo $stmt->rowCount(); exit;



}



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