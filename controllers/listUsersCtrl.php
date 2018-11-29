<?php
// on instancie une variable $patient pour la classe patients
$user = NEW users();
// condition si le submit existe
if(isset($_POST['submitDelete'])) {
    // condition si l'id existe
    if (isset($_GET['id'])) {
        // récupération de l'id transmis par l'url
    $user->id = $_GET['id'];

    // instanciation de la méthode
    $deleteUserProfil = $user->deleteUserProfile();

    }
}
// on instancie une variable $getUserList pour la méthode getUserList
$getUserList = $user->getUserList();
        

// pagination
// on décide de limiter les résultats à 5
$limit = 5;
// on récupère le numéro de la page
// on récupère le nombre de patients
$numberOfResults = $user->numberOfResults();
// on calcule le nombre de page en arrondisssant à l'entier supérieur
$numberOfPages = ceil($numberOfResults->countResults / $limit);
if(!empty($_GET['page'])){
    if(!is_numeric($_GET['page']) || $_GET['page'] > $numberOfPages || $_GET['page'] <= 0 ){
        $page = 1;
} else {
    $page = $_GET['page'];
}
} else {
    $page = 1;
}

// on le calcule le décalage qu'on ne prends pas en compte
$offset = ($page - 1) * $limit;
$listUsers = $user->getUsersListByN($limit, $offset);


