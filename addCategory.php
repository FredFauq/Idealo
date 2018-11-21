<?php
// ajout du header
include_once 'header.php';
// ajout du contrôleur
include_once 'controllers/addCategoryCtrl.php';
?>
<!-- formulaire d'inscription produit début -->
<div class="container-fluid">
    <div class="row justify-content-center">
            <div id="formBox" class="col-xs-12 ml-auto mr-auto col-sm-12 ml-auto mr-auto col-md-12 col-lg-6 ml-auto mr-auto col-xl-6 ml-auto mr-auto">
        <?php if (isset($_SESSION['isConnect']) && isset($_SESSION['role']) && $_SESSION['role'] == 2) { ?>
                <h2>Ajout d'une catégorie de produit</h2>
                <div id="status">
                    ADMINISTRATION
                </div>
                <form class="needs-validation" novalidate action="#" method="POST">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            <input type="text" name="nameCategory" class="form-control" id="nameCategory" placeholder="<?= REGISTER_CATEGORY_NAME ?>" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="registerCategory" id="register" value="<?= REGISTER_SUBMIT ?>"/>
                        <a class="btn btn-success" type="text" href="menuAdmin.php" name="loginOut" id="loginOut"><i class="fas fa-share-square"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
<!-- formulaire administrateur fin -->
<?php
// ajout du footer
include_once 'footer.php';
?>