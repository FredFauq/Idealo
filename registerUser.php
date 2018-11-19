<?php
// inclusion du fichier configuration
include_once 'configuration.php';
// inclusion du contrôleur
include_once 'controllers/registerCtrl.php';
// inclusion du header
include_once 'header.php';
?>
<!-- formulaire d'inscription début -->
<div class="container-fluid">

    <div id="formBox" class="col-12 ml-auto mr-auto col-sm-12 ml-auto mr-auto col-md-12 col-lg-6 ml-auto mr-auto col-xl-6 ml-auto mr-auto">
        <h2>INSCRIPTION</h2>
        <div id="status">
            Veuillez remplir tous les champs SVP
        </div>
        <form class="needs-validation" novalidate action="#" method="POST">
            <div class="form-group row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" name="lastname" class="form-control form-control-sm" id="lastname" placeholder="<?= REGISTER_LASTNAME ?>" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" name="firstname" class="form-control form-control-sm" id="firstname" placeholder="<?= REGISTER_FIRSTNAME ?>" required/>
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
                            <input type="date" name="birthdate" class="form-control form-control-sm" id="birthdate" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
                            <input type="text" name="address" class="form-control form-control-sm" id="address" placeholder="<?= REGISTER_ADDRESS ?>" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
                            <input type="text" name="zipcode" class="form-control form-control-sm" id="zipcode" placeholder="<?= REGISTER_ZIPCODE ?>" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-city"></span></div>
                            <input type="text" name="city" class="form-control form-control-sm" id="city" placeholder="<?= REGISTER_CITY ?>" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-globe-americas"></span></div>
                            <input type="text" name="country" class="form-control form-control-sm" id="country" placeholder="<?= REGISTER_COUNTRY ?>" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group">      
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-at"></span></div>
                            <input type="text" name="mail" class="form-control form-control-sm" id="mail" placeholder="<?= REGISTER_MAIL ?>" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group"> 
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-phone"></span></div>
                            <input type="phone" name="phone" class="form-control form-control-sm" id="phone" placeholder="<?= REGISTER_PHONE ?>" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group"> 
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-user-check"></span></div>
                            <input type="login" name="login" class="form-control form-control-sm" id="login" placeholder="<?= REGISTER_LOGIN ?>" maxlength="16" required/>
                        </div>
                    </div>       
                </div>       
            </div>
            <div class="form-group row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group"> 
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-key"></span></div>
                            <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="<?= REGISTER_PASSWORD ?>" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="input-group"> 
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fas fa-key"></span></div>
                            <input type="password" name="passwordVerify" class="form-control form-control-sm" id="passwordVerify" placeholder="<?= REGISTER_PASSWORD_VERIFY ?>" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="btn btn-success btn-sm" type="submit" name="register" id="register" value="<?= REGISTER_SUBMIT ?>"/>
                <a class="btn btn-success btn-sm" type="text" href="index.php" name="toIndex" id="toIndex"><i class="fas fa-share-square"></i></a>
            </div>
        </form>
        <?php if ($message != '') { ?>
                <h3><?= $message ?></h3>
            <?php } ?>
    </div>
</div>
</div>
<!-- formulaire d'inscription fin -->
<!-- inclusion du footer -->
<?php include_once 'footer.php'; ?>