<?php
// on instancie une variable $patient pour la classe patients
$product = NEW gleola1_Products();

// condition si le submit existe
if(isset($_POST['submit'])) {
    // condition si l'id existe
    if (isset($_GET['id'])) {
        // récupération de l'id transmis par l'url
    $product->id = $_GET['id'];
    // instanciation de la méthode
    $deleteProduct = $product->deleteProduct();
}
}
if(isset($_POST['search'])) {
    $product->search = $_POST['search'];
     //Déclaration de la variable $search qui est égale a $_POST['nameAsked'
    $search = htmlspecialchars($_POST['search']);
    //strip_tags — Supprime les balises HTML et PHP d'une chaîne
    $search = strip_tags($search);
    //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    $search = trim($search);
    $productRegex = '/^[a-z _\'\-àâäéèêëîïôöûüùçæ]*$/i';
    if (preg_match($productRegex, $search)) {
            //Éxécution de la méthode searchProduct() de l'instance intégration dans $listPatients
            $getProductList = $product->searchProduct();
    } else {
            $error = 'Recherche invalide';
        }
} else {
// on instancie une variable $getProductList pour la méthode getProductList
$getProductList = $product->getProductList();
    
}
// pagination
// on décide de limiter les résultats à 5
$limit = 5;
// on récupère le numéro de la page
// on récupère le nombre de patients
$numberOfResults = $product->numberOfResults();
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
$listProducts = $product->getProductByFive($limit, $offset);




