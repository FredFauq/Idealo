<?php
// ajout du header
include_once 'header.php';
// ajout du contrôleur
include_once 'controllers/addProductCtrl.php';
?>
<!-- formulaire d'ajout produit début -->
<div class="container-fluid">
    <div class="row justify-content-center">
            <div id="formBox" class="col-xs-12 ml-auto mr-auto col-sm-12 ml-auto mr-auto col-md-12 col-lg-6 ml-auto mr-auto col-xl-6 ml-auto mr-auto">
        <?php if (isset($_SESSION['isConnect']) && isset($_SESSION['role']) && $_SESSION['role'] == 2) { ?>
                <h2>Ajout d'un produit</h2>
                <div id="status">
                    ADMINISTRATION
                </div>
                <form class="needs-validation" novalidate action="#" method="POST">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            <input type="text" name="labelProduct" class="form-control" id="labelProduct" placeholder="<?= REGISTER_LABEL_PRODUCT ?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            <input type="text" name="labelCategory" class="form-control" id="labelProduct" placeholder="<?= REGISTER_LABEL_CATEGORY ?>" required/>
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
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="registerProduct" id="register" value="<?= REGISTER_SUBMIT ?>"/>
                        <a class="btn btn-success" type="text" href="menuAdmin.php" name="loginOut" id="loginOut"><i class="fas fa-share-square"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- formulaire ajout Produit fin -->
    <?php
} else {
    ?>
    <div class="card-header">
        <h2 class="card-title">
            <span class="glyphicon glyphicon-bookmark"></span>Accés refusé</h2>
    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-12">
                <p>Vous n'avez pas les droits d'accés à cette page</p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="index.php" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Accueil</a>
    </div>

    <?php
}
?>
<?php
// ajout du footer
include_once 'footer.php';
?>