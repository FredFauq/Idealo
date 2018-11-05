<?php
include_once 'header.php';
include_once '../controllers/registerCtrl.php';
?>
<div class="container-fluid">
    <div class="row">
        <div id="formBox" class="offset-3 col-6 offset-3">
            <h2>Inscription</h2>
            <form action="#" method="POST">
                <div class="form-group has-error">
                    <label for="lastname"><?= REGISTER_LASTNAME ?></label>
                    <input type="text" name="lastname" id="lastname"/>
                </div>
                <div class="form-group has-error">
                    <label for="firstname"><?= REGISTER_FIRSTNAME ?></label>
                    <input type="text" name="firstname" id="firstname"/>
                </div>
                <div class="form-group has-error">
                    <label for="birthdate"><?= REGISTER_BIRTHDATE ?></label>
                    <input type="text" name="birthdate" id="birthdate"/>
                </div>
                <div class="form-group has-error">
                    <label for="address"><?= REGISTER_ADDRESS ?></label>
                    <input type="text" name="address" id="address"/>
                </div>
                <div class="form-group has-error">
                    <label for="mail"><?= REGISTER_MAIL ?></label>
                    <input type="mail" name="mail" id="mail"/>
                </div>
                <div class="form-group has-error">
                    <label for="phone"><?= REGISTER_PHONE ?></label>
                    <input type="phone" name="phone" id="phone"/>
                </div>
                <div class="form-group has-error">
                    <label for="login" class="control-label"><?= REGISTER_LOGIN ?></label>
                    <input type="text" name="login" id="login" class="form-control"/>
                </div>
                <div class="form-group has-error">
                    <label for="password"><?= REGISTER_PASSWORD ?></label>
                    <input type="password" name="password" id="password"/></div>
                <div class="form-group has-error">
                    <label for="passwordVerify"><?= REGISTER_PASSWORD_VERIFY ?></label>
                    <input type="password" name="passwordVerify" id="passwordVerify"/></div>
                <div class="form-group has-error">
                    <input type="submit" name="register" id="register" value="<?= REGISTER_SUBMIT ?>" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>