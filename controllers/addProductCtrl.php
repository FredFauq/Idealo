<?php
//on instancie une variable $categoryList pour l'objet categories
$categoryList = NEW categories();
//on instancie une variable $getCategoryList pour la méthode getCategoryList
$getCategoryList = $categoryList->getCategoryList();
// on initialise les variables
$labelProduct = '';
$labelCategory = '';
$textProduct = '';
$priceProduct = '';
$barcodeProduct = '';
$imgProduct = '';
$search = '';
$errorList = array();
$successList = array();


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
            $categoryList->id = htmlspecialchars($_POST['nameCategory']);
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
    
      $target_dir = 'assets/img/';
$target_file = $target_dir . basename($_FILES['imgProduct']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES['imgProduct']['tmp_name']);
    if($check !== false) {
        $successList['imgProduct'] = REGISTER_IMAGE_FILE . $check['mime'] . '.';
    } else {
        $errorList['imgProduct'] = REGISTER_NOT_IMAGE_FILE . '.';
    }
}
// on vérifie si le fichier existe
if (file_exists($target_file)) {
    $errorList['imgProduct'] = REGISTER_EXIST_FILE . '.';
}
// on vérfie la taille du fichier
if ($_FILES['imgProduct']['size'] > 500000) {
    $errorList['imgProduct'] = REGISTER_SIZE_FILE . '.';
}
// autorisations des extensions de fichier
if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg'
&& $imageFileType != 'gif' ) {
    $errorList['imgProduct'] = REGISTER_TYPE_FILE . '.';
}
// on vérifie que $errorList est différent de 0
if (count($errorList) != 0) {
    $errorList['imgProduct'] = REGISTER_FAILED_FILE . '.';
// si tout est ok , on upload le fichier
} else {
    if (move_uploaded_file($_FILES['imgProduct']['tmp_name'], $target_file)) {
        // on affiche le message de succés
        $successList['imgProduct'] = REGISTER_FILE. basename( $_FILES['imgProduct']['name']). REGISTER_FILE_UPLOAD . '.';
    } else {
        // sinon on affiche le message d'erreur
        $errorList['imgProduct'] = REGISTER_ERROR_FILE . '.';
    }
}
    // S'il n'y a pas d'erreur
    if (count($errorList) == 0) {
        // on instancie la classe products
        $product = new products();
        // on hydrate les valeurs
        $product->labelProduct = $labelProduct;
        $product->textProduct = $textProduct;
        $product->priceProduct = $priceProduct;
        $product->barcodeProduct = $barcodeProduct;
        $product->imgProduct = $imgProduct;
        // on éxécute la méthode addProduct
        $product->addProduct();
    }
