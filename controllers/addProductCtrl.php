<?php
//on instancie une variable $patient pour l'objet patients
$category = NEW categories();
//on instancie une variable $getPatientProfil pour la méthode getPatientProfil
$getCategoryList = $category->getCategoryList();
// on initialise les variables
$labelProduct = '';
$labelCategory = '';
$textProduct = '';
$priceProduct = '';
$barcodeProduct = '';
$imgProduct = '';
$search = '';
$errorList = array();


//Validation du formulaire
    // on vérifie que la saisie existe et n'est pas vide
    if (!empty($_POST['labelProduct'])) {
        // on sécurise par htmlspecialchars
        $labelProduct = htmlspecialchars($_POST['labelProduct']);
    } else {
        // sinon on affiche une erreur
        $errorList['labelProduct'] = ERROR_LABEL_PRODUCT;
    }
    // on vérifie que la saisie existe et n'est pas vide
     if (!empty($_POST['nameCategory'])) {
         // OU si le formulaire a été validé mais que il n'y a pas d'élément sélectionné dans le menu déroulant
        // on crée un message d'erreur pour pouvoir l'afficher
        if (!is_nan($_POST['nameCategory'])) {  
            $category->id = htmlspecialchars($_POST['nameCategory']);
        } else {
            $formError['nameCategory'] = ERROR_NAME_CATEGORY;
        }
    } else {
            $formError['nameCategory'] = ERROR_NONE_CATEGORY;
        }
         
    
    if (!empty($_POST['textProduct'])) {
        $textProduct = htmlspecialchars($_POST['textProduct']);
    } else {
        $errorList['textProduct'] = ERROR_TEXT_PRODUCT;
    }
    
     if (!empty($_POST['priceProduct'])) {
        $priceProduct = htmlspecialchars($_POST['priceProduct']);
    } else {
        $errorList['priceProduct'] = ERROR_PRICE_PRODUCT;
    }
    
      if (!empty($_POST['barcodeProduct'])) {
        $barcodeProduct = htmlspecialchars($_POST['barcodeProduct']);
    } else {
        $errorList['barcodeProduct'] = ERROR_BARCODE_PRODUCT;
    }
    
      if (!empty($_POST['imgProduct'])) {
        $imgProduct = htmlspecialchars($_POST['imgProduct']);
    } else {
        $errorList['imgProduct'] = ERROR_IMG_PRODUCT;
    }
    // S'il n'y a pas d'erreur
    if (count($errorList) == 0) {
        // on instancie la classe users
        $user = new products();
        // on hydrate les valeurs
        $user->labelProduct = $labelProduct;
        $user->textProduct = $textProduct;
        $user->priceProduct = $priceProduct;
        $user->barcodeProduct = $barcodeProduct;
        $user->imgProduct = $imgProduct;
        // on éxécute la méthode registerUser
        $user->addProduct();
    }
