<?php
// inclusion du fichier configuration
include_once 'configuration.php';
// ajout du contrôleur
include_once 'controllers/loginCtrl.php';
// ajout du header
include_once 'header.php';
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
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="login" class="form-control" id="login" placeholder="<?= FORM_LOGIN ?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" id="password" placeholder="<?= FORM_PASSWORD ?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="<?= FORM_LOGIN_SUBMIT ?>" name="loginSubmit" id="loginSubmit" />
                    <a class="btn btn-success" type="text" href="index.php" name="loginOut" id="loginOut"><i class="fas fa-share-square"></i></a>
                </div>
            </form>
            <?php if ($message != '') { ?>
                <h3><?= $message ?></h3>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    $(function () {
    $('#loginSubmit').blur(function () {
        $.post('controllers/loginCtrl.php', { loginVerify:$(this).val() } , function (data) {
            if(data == 1){
                $('#loginSubmit').show();
                $('#loginOut').hide();
            }else{ 
                $('#loginSubmit').hide();
                $('#loginOut').show();
            }
        },
        'JSON');
    });
});
</script>
<!-- formulaire de connexion fin -->
<?php
// inclusion du footer
include_once 'footer.php';
?>
