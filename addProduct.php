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
            <form action="#" method="POST">
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
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                    <select type="text" name="nameCategory" class="custom-select" id="nameCategory" placeholder="<?= REGISTER_LABEL_CATEGORY ?>" required/>
                                    <option selected disabled>Selectionnez une catégorie</option> 
                                            <?php foreach ($getCategoryList AS $category) { ?>
                                                <option value="<?= $category->id ?>"><?= $category->nameCategory ?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-file-alt"></i></span>
                                    <textarea class="form-control" id="textProduct" name="textProduct" rows = "6"><?= REGISTER_TEXT_PRODUCT ?></textarea>
                                </div>
                            </div>   
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                                    <input type="text" name="priceProduct" class="form-control" id="priceProduct"  placeholder="<?= REGISTER_PRICE_PRODUCT ?>"required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    <input type="text" name="barcodeProduct" class="form-control" id="barcodeProduct" placeholder="<?= REGISTER_BARCODE_PRODUCT ?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-image"></i></span>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"  name="imgProduct" id="imgProduct"/>
                                        <label class="custom-file-label" for="imgProduct"><?= REGISTER_IMG_PRODUCT ?></label>
                                    </div>
                                </div>
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