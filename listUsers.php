<!-- Ajout du header -->
<?php
include_once 'header.php';
?>
 <div class="container-fluid">
            <div class="row">
                <div class="list offset-2 col-8 text-center">
                    <div class="firstTest offset-2 col-8 text-center">           
                        <h3>- Liste des Utilisateurs -</h3>
                        <form class="search" method="post" action="listUsers.php">
                            <input type="text" name="search" placeholder="Recherche..">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            <?php
                            if (isset(getUserList)) {
                                if (getUserList === false) {
                                    ?>
                                    <p>Il y a eu un problème</p>
                                    <?php
                                } elseif (count(getUserList) === 0) {
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
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Date de Naissance</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Code Postal</th>
                                            <th scope="col">Ville</th>
                                            <th scope="col">Pays</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Téléphone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listProducts AS $user) { ?>
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
                                                <td><a href="updateUser.php?id=<?= $user->id ?>"><i class="fas fa-user-edit"></i></a></td>
                                                <td><form method = "POST" action="?id=<?= $user->id ?>">
                                                        <button type="submit" value="" name="submit" class="btn btn-danger"><i class="fas fa-user-slash"></i></i>
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
                </div>

                <a href="menuAdmin.php"><i class="fas fa-sign-out-alt fa-4x"></i></a>
            </div>
            <?= $_SERVER['PHP_SELF'] ?>
<!-- Ajout du footer -->
<?php
include_once 'footer.php';
?>