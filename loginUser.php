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
                        <input type="checkbox" onclick="PasswordShowFunction()"/>Afficher le mot de passe
                <div class="form-group">
                    <input class="btn btn-success btn-sm" type="submit" value="<?= FORM_LOGIN_SUBMIT ?>" name="loginSubmit" id="loginSubmit" />
                    <a class="btn btn-success btn-sm" type="text" href="index.php" name="toIndex" id="toIndex"><i class="fas fa-share-square"></i></a>
                </div>
            </form>
            <?php if ($message != '') { ?>
             <!--  contenu Modal -->
<div class="modal-content">
  <div class="modal-header">
    <span class="close">&times;</span>
    <h2><?= $message ?></h2>
  </div>
  <div class="modal-body">
  </div>
  <div class="modal-footer">
    <a type="button" href = "index.php" class="btn btn-secondary" data-dismiss="modal">Accueil</a>
  </div>
</div> 
              <!--  Fin contenu Modal -->  
            <?php } ?>
        </div>
    </div>
</div>
<!-- formulaire de connexion fin -->
<?php
// inclusion du footer
include_once 'footer.php';
?>
