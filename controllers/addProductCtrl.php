<?php
//on instancie une variable $productsList pour l'objet produits
$product = NEW products();
//on instancie une variable $getProductsList pour la méthode getProductsList
$getProductsList = $product->getProductsList();
//on instancie une variable $categoryList pour l'objet categories
$category = NEW categories();
//on instancie une variable $getCategoryList pour la méthode getCategoryList
$getCategoryList = $category->getCategoryList();
// on initialise les variables
$labelProduct = '';
$labelCategory = '';
$textProduct = '';
$priceProduct = '';
$barcodeProduct = '';
$imgProduct = '';
$search = '';
// on déclare les variables de tableau
$errorList = array();
$successList = array();

// déclaration de la regex pour les textes
$regexText = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
//regex pour prix avec 2 décimales 
$regexPrice = '/[0-9]*\.[0-9]{2}/';
// regex pour le code barre EAN13
$regexBarcode = '/[0-9]{13}/';


//Validation du formulaire
// quand l'utilisateur sousmet le formulaire
if(isset($_POST['registerProduct'])) {
    // on vérifie que la saisie existe et n'est pas vide
    if (!empty($_POST['labelProduct'])) {
        // on sécurise par htmlspecialchars
        $labelProduct = htmlspecialchars($_POST['labelProduct']);
        // si on passe pas la regex du texte
        if(!preg_match($regexText, $_POST['labelProduct'])) {
        // on affiche une erreur
        $errorList['labelProduct'] = ERROR_LABEL_PRODUCT;
        }
        // si le champ est vide
        if (empty($_POST['labelProduct'])) {
        // sinon on affiche une erreur
        $errorList['labelProduct'] = ERROR_EMPTY_FIELD;
    }
    }    
    // on vérifie que la saisie existe et n'est pas vide
         // OU si le formulaire a été validé mais que il n'y a pas d'élément sélectionné dans le menu déroulant
     if (!empty($_POST['nameCategory']) && !is_nan($_POST['nameCategory'])) {
            // on sécurise par htmlspecialchars
            $nameCategory = htmlspecialchars($_POST['nameCategory']);
            // sinon on affiche le message d'erreur
            $errorList['nameCategory'] = ERROR_NAME_CATEGORY;
            // si le champ est vide
            if (empty($_POST['nameCategory'])) {
            // sinon on affiche le message d'erreur
            $errorList['nameCategory'] = ERROR_NONE_CATEGORY;
        }
     } 
    // on vérifie que la saisie existe et n'est pas vide
    if (!empty($_POST['textProduct'])) {
        // on sécurise par htmlspecialchars
        $textProduct = htmlspecialchars($_POST['textProduct']);
        // si on passe pas la regex du texte
        if(!preg_match($regexText, $_POST['textProduct'])) {
        // on affiche le message d'erreur
        $errorList['textProduct'] = ERROR_TEXT_PRODUCT;
        }
        // si le champ est vide
        if (empty($_POST['priceProduct'])) {
        // sinon on affiche le message d'erreur
        $errorList['textProduct'] = ERROR_EMPTY_FIELD;
        }
    }
    // on vérifie que la saisie existe et n'est pas vide
     if (!empty($_POST['priceProduct'])) {
        // on sécurise par htmlspecialchars
        $priceProduct = htmlspecialchars($_POST['priceProduct']);
         // si on passe pas la regex du prix  
         if(!preg_match($regexPrice, $_POST['priceProduct'])) {
         // on affiche me message d'erreur
         }
        $errorList['priceProduct'] = ERROR_PRICE_PRODUCT;
        }
      // si le champ est vide
     if (empty($_POST['priceProduct'])) {
         // on affiche le message d'erreur
        $errorList['priceProduct'] = ERROR_EMPTY_FIELD;
     }
     // on vérifie que la saisie existe et n'est pas vide
      if (!empty($_POST['barcodeProduct'])) {
         // on sécurise par htmlspecialchars
        $barcodeProduct = htmlspecialchars($_POST['barcodeProduct']);
          // si on passe pas la regex du code barre
         if(!preg_match($regexBarcode, $_POST['barcodeProduct'])) {
        $errorList['barcodeProduct'] = ERROR_BARCODE_PRODUCT;
         }
         // si le champ est vide
       if (empty($_POST['barcodeProduct'])) {
        // on affiche le message d'erreur
        $errorList['barcodeProduct'] = ERROR_EMPTY_FIELD;  
        }
      }

  // si la superglobale contient un élément
  if (is_uploaded_file($_FILES['imgProduct']['tmp_name'])) {
      // on déclare dans une variable l'élément de la superglobale $_FILES
      $imgUpload = $_FILES['imgProduct'];
      // Tableau contenant les extensions attendues
      $authorizedExtension = array('gif', 'png', 'jpg', 'jpeg');
      // on récupére l'extension du fichier d'upload
      $extension = pathinfo($imgUpload['name'], PATHINFO_EXTENSION);
      // on mets dans une variable le chemin ou verser le fichier
      $end_path = 'assets/uploads/' . $imgUpload['name'];
      // si l'estension n'est pas dans le tableau des autorisées
      if (!in_array($extension, $authorizedExtension)) { 
          // on défini le message d'erreur
          $errorList['imgProduct'] = ERROR_EXTENSION;
          } else { 
              // si le fichier est téléchargé
              if (move_uploaded_file($imgUpload['tmp_name'], $end_path)) {
                  // on récupère le fichier 
                  $product->imgProduct = $imgUpload['name']; 
              } else {
                  // sinon on affiche l'erreur correspondante
                  $errorList['imgProduct'] = ERROR_MOVE;
                  }
       }          
    } else {
        // on affiche une erreur si l'enregistrement à échoué
       $errorList['imgProduct'] = REGISTRATION_ERROR;
    }
  
    // S'il n'y a pas d'erreur et que le fichier est bien transmis
    if ((count($errorList) == 0)) {
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
}

