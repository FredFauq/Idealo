<?php
// pour l'upload du fichier image
if (!empty($_FILES['imgProduct'])) {
    if (is_uploaded_file($_FILES['imgProduct']['tmp_name'])) {
        // Tableau contenant les extensions autorisées 
        $authorizedExtension = array('png', 'gif', 'jpeg'); 
        //variable de tableau contenant la valeur 
        $_FILES $img1 = $_FILES['imgProduct']; 
        // Récupère le nom temporaire du fichier qui a été stocké sur le serveur 
        $start_path = $img1['tmp_name'];
        // Récupère le nom original du fichier présent sur le chemin d'origine 
        $path = $img1['name']; 
        // Récupère le résultat d'une fonction permettant de récupérer l'extension d'un fichier 
        $extension = pathinfo($path, PATHINFO_EXTENSION); $end_path = 'assets/img/' . $img1['name']; 
        // Compare l'extension avec les données du tableau contenant les extensions attendues 
        if (!in_array($extension, $authorizedExtension)) {
            $errorList['imgProduct'] = ERROR_IMG_PRODUCT;
            } else { 
                //permet de déplacer le fichier du dossier temporaire au dossier définitif
                if (move_uploaded_file($start_path, $end_path)) { 
                $imgProduct->imgProduct = $img1['name']; 
                $imgProduct->addProduct(); 
                } 
            //insertion en base du nom // 
            $product = new products(); 
            $product->name = $pdf['name'];
            $product->uploadFile(); 
            } 
             
        } 
             
}



$target_dir = 'assets/img/';
$target_file = $target_dir . basename($_FILES['imgProduct']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES['imgProduct']['tmp_name']);
    if($check !== false) {
        echo REGISTER_IMAGE_FILE . $check['mime'] . '.';
        $uploadOk = 1;
    } else {
        echo REGISTER_NOT_IMAGE_FILE . '.';
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo REGISTER_EXIST_FILE . '.';
    $uploadOk = 0;
}
// Check file size
if ($_FILES['imgProduct']['size'] > 500000) {
    echo REGISTER_SIZE_FILE . '.';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg'
&& $imageFileType != 'gif' ) {
    echo REGISTER_TYPE_FILE . '.';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo REGISTER_FAILED_FILE . '.';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['imgProduct']['tmp_name'], $target_file)) {
        echo REGISTER_FILE. basename( $_FILES['imgProduct']['name']). REGISTER_FILE_UPLOAD . '.';
    } else {
        echo REGISTER_ERROR_FILE . '.';
    }
}
?>
