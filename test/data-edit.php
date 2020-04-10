<?php
$page_name = 'data-edit';
require __DIR__ . '/__connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
// 如果沒有給 sid, 就轉到列表頁
if (empty($sid)) {
    header('Location: data-list.php');
    exit;
}

$sql = "SELECT * FROM address_book WHERE sid=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$sid]);
$r = $stmt->fetch();
// 如果沒有拿到資料
if (empty($r)) {
    header('Location: data-list.php');
    exit;
}

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
    <style>
        .form-group small.form-text {
            color: red;
        }

    </style>
    <div class="container">

        <div id="info-bar" class="alert alert-success" role="alert" style="display: none">
            123
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">修改資料</h5>
                        <form name="form1" method="post" onsubmit="return checkForm()" novalidate>
                            <input type="hidden" name="sid" value="<?= $r['sid'] ?>">
                            <div class="form-group">
                                <label for="name">* name</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                       value="<?= htmlentities($r['name']) ?>">
                                <small id="nameHelp" class="form-text"></small>
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value="<?= htmlentities($r['email']) ?>">
                                <small id="emailHelp" class="form-text"></small>
                            </div>
                            <div class="form-group">
                                <label for="mobile">* mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                       pattern="09\d{2}-?\d{3}-?\d{3}" required
                                       value="<?= htmlentities($r['mobile']) ?>">
                                <small id="mobileHelp" class="form-text"></small>
                            </div>
                            <div class="form-group">
                                <label for="birthday">birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday"
                                       value="<?= htmlentities($r['birthday']) ?>">
                                <small id="birthdayHelp" class="form-text"></small>
                            </div>
                            <div class="form-group">
                                <label for="address">address</label>
                                <textarea class="form-control" name="address" id="address" cols="30"
                                          rows="3"><?= htmlentities($r['address']) ?></textarea>
                                <small id="addressHelp" class="form-text"></small>
                            </div>
                            <button type="submit" class="btn btn-primary">修改</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
    <script>
        const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

        const $name = $('#name'),
            $email = $('#email'),
            $mobile = $('#mobile'),
            $nameHelp = $('#nameHelp'),
            $emailHelp = $('#emailHelp'),
            $mobileHelp = $('#mobileHelp'),
            $info = $('#info-bar')


        function checkForm() {
            let isPass = true; // 有沒有通過檢查
            // 回復提示設定
            $('#info-bar').hide();
            $name.css('border-color', '#CCCCCC');
            $nameHelp.text('');

            $email.css('border-color', '#CCCCCC');
            $emailHelp.text('');

            $mobile.css('border-color', '#CCCCCC');
            $mobileHelp.text('');

            if ($name.val().length < 2) {
                $name.css('border-color', 'red');
                $nameHelp.text('請填寫正確的姓名');
                isPass = false;
            }

            if ($email.val()) {
                if (!email_re.test($email.val())) {
                    $email.css('border-color', 'red');
                    $emailHelp.text('請填寫正確的 Email 格式');
                    isPass = false;
                }
            }

            if (!mobile_re.test($mobile.val())) {
                $mobile.css('border-color', 'red');
                $mobileHelp.text('請填寫正確的手機號碼');
                isPass = false;
            }

            if (isPass) {
                $.post('data-edit-api.php', $(document.form1).serialize(), function (data) {
                    if (data.success) {
                        $info.removeClass('alert-danger').addClass('alert-success');
                        $info.show().text('修改成功');
                    } else {
                        $info.removeClass('alert-success').addClass('alert-danger');
                        $info.show().text(data.error);
                    }
                }, 'json');
            }

            return false;
        }
    </script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>