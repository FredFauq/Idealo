<?php
// Définition des informations de connexion à la base de données
define('HOST', '127.0.1.1');
define('LOGIN', 'Fred');
define('PASSWORD', '200469');
define('DBNAME', 'Ideola');

// Ajout des fichiers nécessaire au bon fonctionnement du site
include_once 'class/database.php';
include_once 'models/modelUsers.php';

