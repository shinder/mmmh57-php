<?php
$page_name = 'data-insert2';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
    <style>
        .form-group small.form-text {
            color: red;
        }

    </style>
<div class="container">

        <div id="info-bal" class="alert alert-success" role="alert" style="display: none">
            123
        </div>

    <div class="row">
        <div class="col-lg-6">
            <form method="post" onsubmit="return checkForm()" novalidate>
                <div class="form-group">
                    <label for="name">* name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <small id="nameHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <small id="emailHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="mobile">* mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" required
                           >
                    <small id="mobileHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="birthday">birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday">
                    <small id="birthdayHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                    <small id="addressHelp" class="form-text"></small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    const $name = $('#name')

    function checkForm(){
        if($name.val().length < 2){
            $('#nameHelp').text('請填寫正確的姓名');
        }



        return false;
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>