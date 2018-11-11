<?php
session_start();
include_once 'configuration.php';
include_once 'lang/FR_FR.php';
include_once 'controllers/headerCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>IDEALOE</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
        <script src="../assets/js/script.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" >
        <link href="https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope" rel="stylesheet"> 
        <!-- My custom styles -->
        <link href="../assets/css/style.css" rel="stylesheet">
        <title><?= ($_SERVER['PHP_SELF']) == 'index.php' ? LOGIN_TITLE : REGISTER_TITLE ?></title>
    </head>
    <body>
<header>
        <!-- Navbar début -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">IDEALOE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php"><i class="fas fa-home"></i> Acceuil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-grip-horizontal"></span>
                            Catalogue
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Fruits secs</a> 
                            <a class="dropdown-item" href="#">Boissons multivitaminées</a> 
                            <a class="dropdown-item" href="#">Compléments alimentaires</a>
                            <a class="dropdown-item" href="#">Forme & contrôle du poids</a>
                            <a class="dropdown-item" href="#">Bien-être</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Table</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <?php if (!isset($_SESSION['isConnect'])) { ?>
                            <a class = "nav-link" href="register.php"><i class="fas fa-user-plus"></i><?= NAV_REGISTER ?></a>
                        <?php } else { ?>
                            <a class = "nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><?= sprintf(NAV_WELCOME,$_SESSION['firstname'])  ?></a>  
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] ?>?action=disconnect"><?= NAV_DISCONNECT ?></a>
                            </div>
                        <?php }
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
                    </li>
                </ul>
                <form class="form-inline">
                    <div class="input-group">
                    <input class="form-control mr-sm-2" type="text" placeholder="Recherche" aria-label="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                    </div>
                </form>
                <!-- Right -->
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link waves-effect">
                            <span class="badge badge-danger"> 1 </span>
                            <i class="fas fa-shopping-cart"></i>
                            <span class="clearfix d-none d-sm-inline-block"> PANIER </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link waves-effect" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navbar fin -->
</header>