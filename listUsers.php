<?php
// inclusion de header
include_once 'header.php';
// inclusion de la classe users
include_once 'models/modelUsers.php';
// inclusion du controller
include_once 'controllers/listUsersCtrl.php';
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="list col-12 text-center">         
            <?php if (isset($_SESSION['isConnect']) && isset($_SESSION['role']) && $_SESSION['role'] == 2) { ?>
                <div class="card">
                    <div class="card-header">
                        <h3>LISTE DES UTILISATEURS</h3>
                        <?php
                        if (isset($getUserList)) {
                            if ($getUserList === false) {
                                ?>
                                <p>Il y a eu un problème</p>
                                <?php
                            } elseif (count($getUserList) === 0) {
                                ?>
                                <p>Il n'y a aucun résultat</p>
                                <?php
                            } else {
                                ?>
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table justify-content-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prénom</th>
                                                <th scope="col">Date de Naissance</th>
                                                <th scope="col">Adresse</th>
                                                <th scope="col">Code Postal</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Téléphone</th>
                                                <th scope="col">Modif.</th>
                                                <th scope="col">Supp.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listUsers AS $user) { ?>
                                                <tr>
                                                    <td><?= $user->id ?></td>
                                                    <td><?= $user->lastname ?></td>
                                                    <td><?= $user->firstname ?></td>
                                                    <td><?= $user->birthdate ?></td>
                                                    <td><?= $user->address ?></td>
                                                    <td><?= $user->zipcode ?></td>
                                                    <td><?= $user->city ?></td>
                                                    <td><?= $user->country ?></td>
                                                    <td><?= $user->mail ?></td>
                                                    <td><?= $user->phone ?></td>
                                                    <td><a href="changeUserProfile.php?id=<?= $user->id ?>"><i class="fas fa-user-edit"></i></a></td>
                                                    <td><form method = "POST" action="?id=<?= $user->id ?>">
                                                            <button type="submit" value="" name="submitDelete" class="btn-sm btn-danger"><i class="fas fa-user-slash"></i></i>
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
                    <div class="card-footer">
                        <ul class="pagination justify-content-center">
                            <?php if ($page > 1) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="listUsers.php?page=<?= $page - 1 ?>">&laquo;</a>
                                </li>
                            <?php } ?>
                            <?php for ($i = 1; $i <= $numberOfPages; $i++) { ?>
                                <li class="page-item <?= $_SERVER['PHP_SELF'] == '/listUsers.php?page=' ?> ? . 'active' : '' ">
                                    <a class="page-link" href="listUsers.php?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                                <?php
                            }
                            ?>
                            <?php if ($page < $numberOfPages) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="listUsers.php?page=<?= $page + 1 ?>">&raquo;</a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <a class="btn btn-success btn-sm" type="text" href="menuAdmin.php" name="toIndex" id="toIndex"><i class="fas fa-share-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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