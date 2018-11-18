<!-- Ajout du header -->
<?php
include_once 'header.php';
?>

<div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-6 offset-3 col-lg-6">
            <div class="card text-center">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="glyphicon glyphicon-bookmark"></span> MENU ADMINISTRATION</h3>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12">
                            <a href="register.php" class="btn btn-success" role="button" id="board"><span class="fas fa-user-plus"></span> <br/>Ajout client</a>
                            <a href="#" class="btn btn-success" role="button" id="board"><span class="fas fa-user-edit"></span> <br/>Modification client</a>
                            <a href="#" class="btn btn-success" role="button" id="board"><span class="fas fa-users"></span> <br/>Liste clients</a>
                            <a href="#" class="btn btn-success" role="button" id="board"><span class="fas fa-user-slash"></span> <br/>Suppression clients</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="addProduct.php" class="btn btn-success" role="button" id="board"><img src="/assets/img/icons/ajouter-une-étiquette-24.png"> <br/>Ajout Produit</a>
                            <a href="#" class="btn btn-success" role="button" id="board"><img src="/assets/img/icons/ajouter-une-étiquette-24.png"><br/>Modification Produit</a>
                            <a href="#" class="btn btn-success" role="button" id="board"><img src="/assets/img/icons/ajouter-une-étiquette-24.png"> <br/>Liste Produit</a>
                            <a href="#" class="btn btn-success" role="button" id="board"><img src="/assets/img/icons/ajouter-une-étiquette-24.png"> <br/>Suppression Produit</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="index.php" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Accueil</a>
                </div>
            </div>
        </div>
</div>
<!-- Ajout du footer -->
<?php
include_once 'footer.php';
?>