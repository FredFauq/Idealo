<?php
// on instancie une variable $product pour l'objet products
$product = NEW products();
// on récupére l'id 
$product->id = $_GET['id'];
// on instancie une variable $getProductByID pour la méthode getProductByID
$getProductByID = $product->getProductByID();
// on instancie une variable $updateProduct pour la méthode updateProduct
$updateProduct = $product->updateProduct();

// on déclare les variables de tableau
$errorList = array();
$successList = array();
$image_sizes = array();

// déclaration de la regex pour les textes
$regexText = '/^[0-9A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° %\+!:?,.;\/\(\)*€$£¤\[\]\"\'\-]+$/';
//regex pour prix avec 2 décimales 
$regexPrice = '/[0-9]*\.[0-9]{2}/';
// regex pour le code barre EAN13
$regexBarcode = '/[0-9]{13}/';

//Validation du formulaire
// quand l'utilisateur sousmet le formulaire
if(isset($_POST['updateProduct'])) {
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
        // si le champ est vide
        if (empty($_POST['textProduct'])) {
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
        $errorList['priceProduct'] = ERROR_PRICE_PRODUCT;
         }
      // si le champ est vide
     if (empty($_POST['priceProduct'])) {
         // on affiche le message d'erreur
        $errorList['priceProduct'] = ERROR_EMPTY_FIELD;
     }
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
              $image_sizes = getimagesize($_FILES['imgProduct']['tmp_name']);
                if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) {
                    $errorList['imgProduct'] = 'Image trop grande';
                }
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
    //vérification qu'il n'y a pas d'erreur par la fonction count et que le bouton a été activé
    if (count($errorList) == 0 && isset($_POST['updateProductBtn'])){
        $successList['updateProductBtn'] = USER_REGISTRATION_SUCCESS;
         
        // si la méthode ne renvoie pas d'instance, afficher le message
        if (!$product->updateProduct()){
            $errorList['updateProductBtn'] = USER_REGISTRATION_ERROR;
        }
    } 
}
?>
