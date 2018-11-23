<!-- inclusion du header -->
<?php
include_once 'header.php';
?>
<div class="container-fluid">
    <div class="row  justify-content-center">
        <div class="list offset-2 col-8 text-center">
            <div class="firstTest offset-2 col-8 text-center">           
                <?php if (isset($_SESSION['isConnect']) && isset($_SESSION['role']) && $_SESSION['role'] == 2) { ?>
                    <h3>- Liste des Produits -</h3>
                    <form class="search" method="post" action="listProducts.php">
                        <input type="text" name="search" placeholder="Recherche..">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                        <?php
                        if (isset(getProductsList)) {
                            if (getProductsList === false) {
                                ?>
                                <p>Il y a eu un problème</p>S
                                <?php
                            } elseif (count(getProductsList) === 0) {
                                ?>
                                <p>Il n'y a aucun résultat</p>
                                <?php
                            } else {
                                ?>
                            </form>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Produit</th>
                                        <th scope="col">Catégories</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Code Barre</th>
                                        <th scope="col">Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listProducts AS $product) { ?>
                                        <tr>
                                            <td><?= $product->id ?></td>
                                            <td><?= $product->labelProduct ?></td>
                                            <td><?= $product->labelProduct ?></td>
                                            <td><?= $product->textProduct ?></td>
                                            <td><?= $product->priceProduct ?></td>
                                            <td><?= $product->barcodeProduct ?></td>
                                            <td><?= $product->imgProduct ?></td>
                                            <td><a href="updateProduct.php?id=<?= $product->id ?>"><img src="/assets/img/icons/icons8-ajouter-une-étiquette-24.png"></i></a></td>
                                            <td><form method = "POST" action="?id=<?= $product->id ?>">
                                                    <button type="submit" value="" name="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
        <div class="offset-5 col-5">
            <ul class="pagination">
                <?php if ($page > 1) { ?>
                    <li class="page-item">
                        <a class="page-link" href="listProducts.php?page=<?= $page - 1 ?>">&laquo;</a>
                    </li>
                <?php } ?>
                <?php for ($i = 1; $i <= $numberOfPages; $i++) { ?>
                    <li class="page-item <?= $_SERVER['PHP_SELF'] == '/listProducts.php?page=' ?> ? . 'active' : '' ">
                        <a class="page-link" href="listProducts.php?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php
                }
                ?>
                <?php if ($page < $numberOfPages) { ?>
                    <li class="page-item">
                        <a class="page-link" href="listProducts.php?page=<?= $page + 1 ?>">&raquo;</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

        <a href="menuAdmin.php"><i class="fas fa-sign-out-alt fa-4x"></i></a>
    </div>
<?php } else { ?>
<!-- Card accés refusé -->
    <div class="container">
        <div class="card text-center">
            <?= $_SERVER['PHP_SELF'] ?>
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
                <a href="menuAdmin.php" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Accueil</a>
            </div>
        </div>
    </div>
    <?php
}
?>
<!-- Card accés refusé fin -->
<!-- inclusion du footer -->
<?php
include_once 'footer.php';
?>