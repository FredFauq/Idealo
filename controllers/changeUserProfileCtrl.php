<?php
// on instancie une variable $patient pour l'objet patients
$users = NEW users();
// on récupére l'id 

if(!empty($_GET['id']) && $_SESSION['role'] == 2){
$users->id = $_GET['id']; 
} else {
    $users->id = $_SESSION['id'];
}

// on instancie une variable $getPatientProfil pour la méthode getPatientProfil
$getUserProfileByID = $users->getUserProfileByID();
// on instancie une variable $changePatientProfil pour la méthode changePatientProfil
$changeUserProfile = $users->changeUserProfile();

// regex pour les noms et villes
$regexText = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
// regex téléphone
$regexPhone = '/^(\d){10}$/';
// regex code postal
$regexZipcode = '/^(\d){5}$/';
// regex login
$regexLogin = '/^[a-zA-Z0-9_\- àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ°]{2,20}$/';
// regex pour l'adresse mail (autorisation chiffres lettres, obligation de l'@ et .)
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
// déclaration du tableau d'erreur
$errorList = array();
$successList = array();

    //Si le parametre existe
     if (isset($_POST['lastname'])) {
            // Conversion des caractères speciaux via htmlspecialchars = protection
            $users->lastname = htmlspecialchars($_POST['lastname']);
             // Test que la variable n'est pas égale à la regeX
        if (!preg_match($regexText, $_POST['lastname'])) {
            // afficher le message d'erreur
            $errorList['lastname'] = ERROR_LASTNAME;
        } 
        // On test si $users->lastname est vide
        if (empty($users->lastname)) {
        // je crée le message d'erreur suivant dans le tableau d'erreur
        $formError['lastname'] = ERROR_EMPTY_FIELD;
        }
    }
    //vérification par double condition
    if (isset($_POST['firstname'])) {
        // Conversion des caractères speciaux via htmlspecialchars = protection
            $users->firstname = htmlspecialchars($_POST['firstname']);
             // Test que la variable n'est pas égale à la regeX
        if (!preg_match($regexText, $_POST['firstname'])) {
            // afficher le message d'erreur
            $errorList['firstname'] = ERROR_FIRSTNAME;
        } 
        // On test si $users->lastname est vide
        if (empty($users->firstname)) {
        // je crée le message d'erreur suivant dans le tableau d'erreur
        $formError['firstname'] = ERROR_EMPTY_FIELD;
        }
    }
    //vérification par double condition
    if (isset($_POST['birthdate'])) {
            $users->birthdate = htmlspecialchars($_POST['birthdate']);
        if (empty($_POST['birthdate']))  {       
        $errorList['birthdate'] = ERROR_EMPTY_FIELD;
        }
    }
    //vérification par double condition
    if (isset($_POST['address'])) {
            $users->address = htmlspecialchars($_POST['address']);
        if (empty($_POST['address'])) {
        $errorList['address'] = ERROR_EMPTY_FIELD;
    }
    }
    //vérification par  conditions
    if (isset($_POST['zipcode'])) {
            $users->zipcode = htmlspecialchars($_POST['zipcode']);
        if (!preg_match($regexZipcode, $_POST['zipcode'])) {
                    $errorList['zipcode'] = ERROR_ZIPCODE;
        }
    if (empty($_POST['zipcode'])){
        $errorList['zipcode'] = ERROR_EMPTY_FIELD;
    }
    }
    //vérification par condition
    if (isset($_POST['city'])) {
            $users->city = htmlspecialchars($_POST['city']);
        if (!preg_match($regexText, $_POST['city'])) {
                 $errorList['city'] = ERROR_CITY;
        }
    if (empty($_POST['city'])){
        $errorList['city'] = ERROR_EMPTY_FIELD;
    }
    }
     //vérification par conditions
    if (isset($_POST['country'])) {
            $users->country = htmlspecialchars($_POST['country']);
        if (!preg_match($regexText, $_POST['country'])) {
               $errorList['country'] = ERROR_COUNTRY;
        }
        if (empty($_POST['country'])){
        $errorList['country'] = ERROR_EMPTY_FIELD;
        }
    }
    //vérification par conditions
     if (isset($_POST['mail'])) {
            $users->mail = htmlspecialchars($_POST['mail']);
        if (!preg_match($regexMail, $_POST['mail'])) {
            $errorList['mail'] = ERROR_MAIL;
        }
        if (empty($_POST['mail'])){
        $errorList['mail'] = ERROR_EMPTY_FIELD;
        }
     }
    //vérification par conditions
     if (isset($_POST['phone'])) {
            $users->phone = htmlspecialchars($_POST['phone']);
        if (!preg_match($regexPhone, $_POST['phone'])) {
            $errorList['phone'] = ERROR_PHONE;
        }
        if (empty($_POST['phone'])){
        $errorList['phone'] = ERROR_EMPTY_FIELD;
        }
     }
     //vérification par conditions
     if (isset($_POST['login'])) {
            $users->login = htmlspecialchars($_POST['login']);
        if (!preg_match($regexLogin, $_POST['login'])) {
            $errorList['login'] = ERROR_LOGIN;
        }
        if (empty($_POST['login'])){
        $errorList['login'] = ERROR_EMPTY_FIELD;
        }
     }
    //vérification qu'il n'y a pas d'erreur par la fonction count et que le bouton a été activé
    if (count($errorList) == 0 && isset($_POST['updateBtn'])){
        $successList['updateBtn'] = USER_REGISTRATION_SUCCESS;
        // si la méthode ne renvoie pas d'instance, afficher le message
        if (!$users->changeUserProfile()){
            $errorList['updateBtn'] = USER_REGISTRATION_ERROR;
        }
    } 

?>
