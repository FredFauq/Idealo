<?php
// inclusion du fichier configuration
include_once 'configuration.php';
// inclusion du header
include_once 'header.php';
?>
<!-- formulaire changement mot de passe début -->
<div class="container">
    <div class="row justify-content-center">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card text-center">
                <div class="card-header">
                    <h3>Modification du mot de passe</h3>
                </div>
                <div class="card-body">
        <form class="form-signin" action="#" method="POST">
                    <div class="form-group">
                        <div class="input-group justify-content-center mb-3"> 
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-key"></span></div>
                                <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="<?= REGISTER_PASSWORD ?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">   
                        <div class="input-group justify-content-center"> 
                            <div class="input-group-prepend">
                                <div class="input-group-text"><span class="fas fa-key"></span></div>
                                <input type="password" name="passwordVerify" class="form-control form-control-sm" id="passwordVerify" placeholder="<?= REGISTER_PASSWORD_VERIFY ?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                       <div class="form-group">
                <input class="btn btn-success btn-sm" type="submit" name="update" id="update" value="<?= REGISTER_UPDATE ?>"/>
                <a class="btn btn-success btn-sm" type="text" href="changeUserProfile.php" name="toIndex" id="toIndex"><i class="fas fa-share-square"></i></a>
            </div>
                    </div>
        </form>
                </div>
            </div>
    </div>
</div>
</div>
</div>
<!-- formulaire changement mot de passe fin -->
<!-- inclusion du footer -->
<?php include_once 'footer.php'; ?>