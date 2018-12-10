<?php
// Définition des informations de connexion à la base de données
define('HOST', '127.0.0.1');
define('LOGIN', 'Fred');
define('PASSWORD', '200469');
define('DBNAME', 'Idealoe');

// Ajout des fichiers nécessaire au bon fonctionnement du site
include_once 'class/database.php';
// inclusion du  modelUsers
include_once 'models/modelUsers.php';
// inclusion du  modelProducts
include_once 'models/modelProducts.php';
// inclusion du  modelCategories
include_once 'models/modelCategories.php';
// Ajout du fichier de langue
include_once 'lang/FR_FR.php';

