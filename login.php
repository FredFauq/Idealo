<?php
include 'header.php';
include_once 'class/database.php';
include_once 'controllers/loginCtrl.php';
?>
<div class="container-fluid">
    <div class="row">
        <div id="formBox" class="offset-3 col-6 offset-3">
            <h2>CONNEXION</h2>
            <form action="#" method="POST">
                <div class="form-group">
                <label for="login"><?= FORM_LOGIN ?></label>
                <input type="text" name="login" id="login" />
                </div>
                <div class="form-group">
                <label for="password"><?= FORM_PASSWORD ?></label>
                <input type="password" name="password" id="password" />
                </div>
                <div class="form-group">
                <input type="submit" value="<?= FORM_LOGIN_SUBMIT ?>" name="loginSubmit" id="loginSubmit" />
                </div>
                <label>
                <input type="checkbox" checked="checked" name="rememberMe"> Se souvenir de moi
                </label>
            </form>
            <?php if ($message != '') { ?>
                <p><?= $message ?></p>
            <?php } ?>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
