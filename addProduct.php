<?php
// ajout du header
include_once 'header.php';
// ajout du contrôleur
include_once 'controllers/addProductCtrl.php';
?>
<!-- formulaire d'inscription début -->
<div class="container-fluid">
    <div id="formBox" class="col-xs-12 ml-auto mr-auto col-sm-12 ml-auto mr-auto col-md-12 col-lg-6 ml-auto mr-auto col-xl-6 ml-auto mr-auto">
        <h2>ADMINISTRATION</h2>
        <div id="status">
            Ajout d'un produit
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
                <input class="btn btn-success" type="submit" name="register" id="register" value="<?= REGISTER_SUBMIT ?>"/>
                <a class="btn btn-success" type="text" href="index.php" name="loginOut" id="loginOut"><i class="fas fa-share-square"></i></a>
            </div>
        </form>
    </div>
</div>
<!-- formulaire administrateur fin -->
<?php
// ajout du footer
include_once 'footer.php';
?>