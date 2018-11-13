<?php
// inclusion du header
include_once 'header.php';
// inclusion de la classe database
include_once 'class/database.php';
// inclusion du contrôleur
include_once 'controllers/loginCtrl.php';
?>
<!-- formulaire de connexion début -->
<div class="container-fluid">
    <div class="row">
        <div id="formBox" class="col-12 col-sm-6 ml-auto mr-auto col-md-6 ml-auto mr-auto col-lg-4 ml-auto mr-auto col-xl-4 ml-auto mr-auto">
            <h2>CONNEXION</h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="login"></label>
                    <div class="input-group-prepend">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                        <input type="text" name="login" class="form-control" id="login" placeholder="<?= FORM_LOGIN ?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <div class="input-group-prepend">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        <input type="password" name="password" class="form-control" id="password" placeholder="<?= FORM_PASSWORD ?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="<?= FORM_LOGIN_SUBMIT ?>" name="loginSubmit" id="loginSubmit" />
                </div>
            </form>
            <?php if ($message != '') { ?>
                <p><?= $message ?> </p>
            <?php } ?>
        </div>
    </div>
</div>
<!-- formulaire de connexion fin -->
<!-- inclusion du footer -->
<?php include_once 'footer.php'; ?>

