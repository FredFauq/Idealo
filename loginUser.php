<?php
// inclusion du fichier configuration
include_once 'configuration.php';
// ajout du contrôleur
include_once 'controllers/loginCtrl.php';
// ajout du header
include_once 'header.php';
?>
<!-- formulaire de connexion début -->
<div class="container">
    <div class="row justify-content-center">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <!--  contenu card -->
            <form action="#" method="POST">
    <div class="card text-center">
    <div class="card-header">
            <h2>CONNEXION</h2>
    </div>
        <div class="card-body">
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
                        <input type="checkbox" onclick="PasswordShowFunction()"/>Afficher le mot de passe
            </div>
<div class="card-footer">
                <div class="form-group">
                    <input class="btn btn-success btn-sm" type="submit" value="<?= FORM_LOGIN_SUBMIT ?>" name="loginSubmit" id="loginSubmit" />
                    <a class="btn btn-success btn-sm" type="text" href="index.php" name="toIndex" id="toIndex"><i class="fas fa-share-square"></i></a>
                </div>
            <?php if ($message != '') { ?>
    <h2><?= $message ?></h2>
            <?php } ?>
  </div>
</div> 
            </form>
              <!--  Fin contenu Card -->  
        </div>
    </div>
</div>
<!-- formulaire de connexion fin -->
<?php
// inclusion du footer
include_once 'footer.php';
?>
