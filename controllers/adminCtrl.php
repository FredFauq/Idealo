<?php
// pour le fichier image
if (!empty($_FILES['proofOfPurchase'])) {
    if (is_uploaded_file($_FILES['proofOfPurchase']['tmp_name'])) {
        // Tableau contenant les extensions attendues 
        $authorizedExtension = array('pdf', 'PDF'); 
        //variable de tableau contenant la valeur 
        $_FILES $pdf1 = $_FILES['proofOfPurchase']; 
        // Récupère le nom temporaire du fichier qui a été stocké sur le serveur 
        $start_path = $pdf1['tmp_name'];
        // Récupère le nom original du fichier présent sur la machine cliente 
        $path = $pdf1['name']; 
        // Récupère le résultat d'une fonction permettant de récupérer l'extension d'un fichier 
        $extension = pathinfo($path, PATHINFO_EXTENSION); $end_path = 'assets/imgs/' . $pdf1['name']; 
        // Compare l'extension avec les données du tableau contenant les extensions attendues 
        if (!in_array($extension, $authorizedExtension)) {
            $errorList['proofOfPurchase'] = ERROR_EXTENSION_PROOF;
            } else { 
                //permet de déplacer le fichier du dossier temporaire au dossier définitif
                if (move_uploaded_file($start_path, $end_path)) { 
                $equipment->proofOfPurchase = $pdf1['name']; 
                $equipment->addEquipment(); 
                } 
            //insertion en base du nom // 
            $brand = new brand(); 
            $brand->name = $pdf['name'];
            $brand->uploadFile(); 
            } 
             
        } 
             
}
