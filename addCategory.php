<?php
// inclusion du header
include_once 'header.php';
// inclusion du contrôleur
include_once 'controllers/addCategoryCtrl.php';
?>
<!-- formulaire d'ajout d'une catégorie début -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <!--  contenu card -->
            <form action="#" method="POST">
                <div class="card text-center">
                    <div class="card-header">
                        <?php if (isset($_SESSION['isConnect']) && isset($_SESSION['role']) && $_SESSION['role'] == 2) { ?>
                            <h2>Ajout d'une catégorie de produit</h2>
                            <div id="status">
                                ADMINISTRATION
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                    <input type="text" name="nameCategory" class="form-control" id="nameCategory" placeholder="<?= REGISTER_CATEGORY_NAME ?>" required/>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="registerCategory" id="register" value="<?= REGISTER_SUBMIT ?>"/>
                                <a class="btn btn-success" type="text" href="menuAdmin.php" name="loginOut" id="loginOut"><i class="fas fa-share-square"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <div class="card text-center">
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
        </div>
    </div>
        <?php
    }
    ?>
    <!-- formulaire d'ajout d'une catégorie fin -->
    <!-- inclusion du footer -->
    <?php
    include_once 'footer.php';
    ?>