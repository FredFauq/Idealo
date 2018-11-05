<?php
include_once 'header.php';
include_once 'controllers/connexionCtrl.php';
?>
        <form action="#" method="POST">
            <label for="login"><?= FORM_LOGIN ?></label>
            <input type="text" name="login" id="login" />
            <label for="password"><?= FORM_PASSWORD ?></label>
            <input type="password" name="password" id="password" />
            <input type="submit" value="<?= FORM_LOGIN_SUBMIT ?>" name="loginSubmit" id="loginSubmit" />
        </form>
        <?php if($message != '') { ?>
            <p><?= $message ?></p>
        <?php } 
 include_once 'footer.php'; ?>
