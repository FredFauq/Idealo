<?php
// inclusion du fichier configuration
include_once 'configuration.php';
// inclusion du header
include_once 'header.php';
// inclusion du contrôleur
include_once 'controllers/changeUserProfileCtrl.php';
?> 

<!-- formulaire de modification profil début -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card text-center">
                <div class="card-header">
                    <h2>
                        <?php
                        if (isset($_SESSION['isConnect']) && !empty($_SESSION['role'])) {
                            if (isset($_POST['update']) && (count($formError) === 0)) {
                        ?> 
                        <p id="ok">Le profil a été enregistré</p> 
    <?php } else { ?>
                            </h2>
                            <h3 id="status">
                                Veuillez modifier votre profil SVP
                            </h3>
                        </div>
                        <form class="form-signin" method="POST">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <input type="text" name="lastname" class="form-control form-control-sm" id="lastname" value="<?= $getUserProfileByID->lastname ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <input type="text" name="firstname" class="form-control form-control-sm" id="firstname" value="<?= $getUserProfileByID->firstname ?>" required/>
                                            </div>
                                        </div>    
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-birthday-cake"></i>
                                                </div>
                                                <input type="date" name="birthdate" class="form-control form-control-sm" id="birthdate" value="<?= $getUserProfileByID->birthdate ?>"required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
                                                <input type="text" name="address" class="form-control form-control-sm" id="address" value="<?= $getUserProfileByID->address ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
                                                <input type="text" name="zipcode" class="form-control form-control-sm" id="zipcode" value="<?= $getUserProfileByID->zipcode ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><span class="fas fa-city"></span></div>
                                                <input type="text" name="city" class="form-control form-control-sm" id="city" value="<?= $getUserProfileByID->city ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><span class="fas fa-globe-americas"></span></div>
                                                <input type="text" name="country" class="form-control form-control-sm" id="country" value="<?= $getUserProfileByID->country ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group">      
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><span class="fas fa-at"></span></div>
                                                <input type="text" name="mail" class="form-control form-control-sm" id="mail" value="<?= $getUserProfileByID->mail ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group"> 
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><span class="fas fa-phone"></span></div>
                                                <input type="phone" name="phone" class="form-control form-control-sm" id="phone" value="<?= $getUserProfileByID->phone ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <div class="input-group"> 
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><span class="fas fa-user-check"></span></div>
                                                <input type="login" name="login" class="form-control form-control-sm" id="login" value="<?= $getUserProfileByID->login ?>" maxlength = "20" required/>
                                            </div>
                                        </div>       
                                    </div>       
                                </div>
                            </div>
                            <p>En créant un compte, vous acceptez nos <a href="#">Conditions d'utilisation et confidentialité.</a></p>
                            <div class="card-footer">
                                <div class="form-group">
                                    <input class="btn btn-success btn-sm" type="submit" name="update" id="update" value="<?= REGISTER_UPDATE ?>"/>
                                    <a class="btn btn-success btn-sm" type="text" href="changeUserPassword.php" name="toChangeUserPassword" id="toChangeUserPassword">Modification mot de passe</a>
                                    <a class="btn btn-success btn-sm" type="text" href="index.php" name="toIndex" id="toIndex"><i class="fas fa-share-square"></i></a>
                                </div>
                            </div>
                        </form>
                        <?php if ($message != '') { ?>
                            <h3><?= $message ?></h3>
                        <?php } ?>
                    <?php }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- formulaire de modification profil fin -->
<!-- inclusion du footer -->
<?php include_once 'footer.php'; ?>