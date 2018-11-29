<?php
// on initialise les variables
$nameCategory = '';
$search = '';
$errorList = array();

//Validation du formulaire
    // on vérifie que la saisie existe et n'est pas vide
    if (!empty($_POST['nameCategory'])) {
        // on sécurise par htmlspecialchars
        $nameCategory = htmlspecialchars($_POST['nameCategory']);
    } else {
        // sinon on affiche une erreur
        $errorList['nameCategory'] = ERROR_NAME_CATEGORY;
    }
    // S'il n'y a pas d'erreur
    if (count($errorList) == 0) {
        // on instancie la classe users
        $user = new category();
        // on hydrate les valeurs
        $user->nameCategory = $nameCategory;
        // on éxécute la méthode registerUser
        $user->addCategory();
    }