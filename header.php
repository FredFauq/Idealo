<?php
// démarrage de session
session_start();
// inclusion du fichier configuration
include_once 'configuration.php';
// inclusion du controller
include_once 'controllers/headerCtrl.php';
?>
<!-- header début -->
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
        <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet"> 
        <!-- Mon css styles -->
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- condition ternaire sur la variable server PHP_SELF pour changement du titre -->
        <title><?= ($_SERVER['PHP_SELF']) == 'index.php' ? LOGIN_TITLE : REGISTER_TITLE ?></title>
    </head>
    <body>
<header>
        <!-- Navbar début -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">IDEALOE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
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
                        <!-- si on n'est pas connecté -->
                        <?php if (!isset($_SESSION['isConnect'])) { ?>
                            <!-- on affiche le lien pour s'inscrire -->
                            <a class = "nav-link" id="register" href="registerUser.php"><i class="fas fa-user-plus"></i><?= NAV_REGISTER ?></a>
                        <?php } else { ?>
                            <!-- et si on l'est on affiche un message de bienvenue personnalisé par le login -->
                        <a class = "navbar-text" ><?= sprintf(NAV_WELCOME,$_SESSION['login']) ?></a>  
                        <?php
                          }
                        ?>
                    </li>
                    <li class="nav-item" id="loginProfil">
                        <!-- si on est connecté -->
                        <?php if (isset($_SESSION['isConnect'])) { ?>
                        <!-- et si on l'est on affiche un lien Profil -->
                        <a class = "nav-link" id = "profile" href="changeUserProfile.php" ><i class="fas fa-user"></i><?= sprintf(NAV_PROFILE,$_SESSION['login']) ?></a>
                        <?php
                          }
                        ?>
                    </li>
                    <li class="nav-item" id="menuAdmin">
                        <!-- si on est connecté en tant qu'administrateur -->
                        <?php if (isset($_SESSION['isConnect']) && isset($_SESSION['role']) && $_SESSION['role'] == 2) { ?>
                        <!-- accés au menu administrateur -->
                        <a class = "nav-link" id = "menuAdmin" href="menuAdmin.php" ><i class="fas fa-bars"></i><?= NAV_MENU_ADMIN ?></a>
                        <?php
                          }
                        ?>
                    </li>
                    <li class="nav-item" id="loginDeconnect">
                        <!-- si on n'est pas connecté -->
                        <?php if (!isset($_SESSION['isConnect'])) { ?>
                        <!-- on affiche le lien pour se connecter -->
                        <a class="nav-link" href="loginUser.php"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                        <?php } else { ?>
                        <!-- et si on l'est on affiche un lien de déconnexion -->
                        <a class = "nav-link" id = "disconnect" href="<?= $_SERVER['PHP_SELF'] ?>?action=disconnect"><i class="fas fa-sign-out-alt"></i><?= NAV_DISCONNECT ?></a>
                        <?php
                          }
                        ?>
                    </li>
                </ul>
                <!-- Right -->
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href = "cart.php">
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
        <!-- header fin -->
