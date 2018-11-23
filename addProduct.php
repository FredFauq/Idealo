<?php
// inclusion du header
include_once 'header.php';
// inclusion du contrôleur
include_once 'controllers/addProductCtrl.php';
?>
<!-- formulaire d'ajout produit début -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <!--  contenu card -->
            <form action="addProduct.php" method="POST" enctype="multipart/form-data">
                <div class="card text-center">
                    <div class="card-header">
                        <?php if (isset($_SESSION['isConnect']) && isset($_SESSION['role']) && $_SESSION['role'] == 2) { ?>
                            <h2>Ajout d'un produit</h2>
                            <div id="status">
                                ADMINISTRATION
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                    <input type="text" name="labelProduct" class="form-control" id="labelProduct" placeholder="<?= REGISTER_LABEL_PRODUCT ?>" required/>
                                    <?php if (isset($errorList['labelProduct'])) { ?>
                                        <p class="text-danger"><?= $errorList['labelProduct']; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                    <select type="text" name="nameCategory" id="nameCategory" required >
                                        <option selected disabled>Selectionnez une catégorie</option> 
                                        <?php foreach ($getCategoryList AS $categoryList) { ?>
                                            <option value="<?= $categoryList->id ?>"><?= $categoryList->nameCategory ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php if (isset($errorList['nameCategory'])) { ?>
                                        <p class="text-danger"><?= $errorList['nameCategory']; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-file-alt"></i></span>
                                    <textarea class="form-control" id="textProduct" name="textProduct" rows = "6"><?= REGISTER_TEXT_PRODUCT ?></textarea>
                                    <?php if (isset($errorList['textProduct'])) { ?>
                                        <p class="text-danger"><?= $errorList['textProduct']; ?></p>
                                    <?php } ?>
                                </div>
                            </div>   
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                                    <input type="text" name="priceProduct" class="form-control" id="priceProduct"  placeholder="<?= REGISTER_PRICE_PRODUCT ?>"required/>
                                    <?php if (isset($errorList['priceProduct'])) { ?>
                                        <p class="text-danger"><?= $errorList['priceProduct']; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    <input type="text" name="barcodeProduct" class="form-control" id="barcodeProduct" placeholder="<?= REGISTER_BARCODE_PRODUCT ?>" required/>
                                    <?php if (isset($errorList['barcodeProduct'])) { ?>
                                        <p class="text-danger"><?= $errorList['barcodeProduct']; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-image"></i></span>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"  name="imgProduct" id="imgProduct"/>
                                        <label class="custom-file-label" for="imgProduct"><?= REGISTER_IMG_PRODUCT ?></label>
                                        <?php if (isset($errorList['imgProduct'])) { ?>
                                            <p class="text-danger"><?= $errorList['imgProduct']; ?></p>
                                        <?php } ?>
                                        <div style="display:none" id="progress" class="progress">
                                            <div  id="progressbar" class="progress-bar" role="progress-bar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else { ?> <div class="alert alert-success"><?= USER_REGISTRATION_SUCCESS ?></div><?php } ?>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" name="registerProduct" id="register" value="<?= REGISTER_SUBMIT ?>"/>
                                    <a class="btn btn-success" type="text" href="menuAdmin.php" name="loginOut" id="loginOut"><i class="fas fa-share-square"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- formulaire ajout Produit fin -->
    <!-- debut bouton top page -->
    <button onclick="topFunction()" id="topBtn" title="topBtn">Top</button>
    <!-- fin bouton top page -->
<?php } else { ?>
    <!-- Card accés refusé -->
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h2 class="card-title">
                    <span class="glyphicon glyphicon-bookmark"></span>Accés refusé</h2>
            </div>
            <div class="card-body ">
                <p>Vous n'avez pas les droits d'accés à cette page</p>
            </div>
            <div class="card-footer">
                <a href="index.php" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Accueil</a>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Card accés refusé fin -->
<!-- inclusion du footer -->
<?php
include_once 'footer.php';
?>