<?php
$page_name = 'data-insert2';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
    <?php if(isset($success)):  ?>
        <?php if($success):  ?>
        <div class="alert alert-success" role="alert">
            資料新增成功
        </div>
        <?php else:  ?>
        <div class="alert alert-danger" role="alert">
            資料新增失敗
        </div>
        <?php endif;  ?>
    <?php endif;  ?>
    <div class="row">
        <div class="col-lg-6">
            <form method="post">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" required
                           value="<?= isset($_POST['name']) ? htmlentities($_POST['name']) : '' ?>">
                    <small id="nameHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= isset($_POST['email']) ? htmlentities($_POST['email']) : '' ?>">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="mobile">mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" required
                           value="<?= isset($_POST['mobile']) ? htmlentities($_POST['mobile']) : '' ?>">
                    <small id="mobileHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="birthday">birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"
                           value="<?= isset($_POST['birthday']) ? htmlentities($_POST['birthday']) : '' ?>">
                    <small id="birthdayHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="3"
                    ><?= isset($_POST['address']) ? htmlentities($_POST['address']) : '' ?></textarea>
                    <small id="addressHelp" class="form-text text-muted"></small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<?php include __DIR__ . '/parts/html-foot.php'; ?>