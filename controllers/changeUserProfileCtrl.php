<?php
// on instancie une variable $patient pour l'objet patients
$users = NEW users();
// on récupére l'id dans la variable
$users->id = $_SESSION['id'];
// on instancie une variable $getPatientProfil pour la méthode getPatientProfil
$getUserProfileByID = $users->getUserProfileByID();
// on instancie une variable $changePatientProfil pour la méthode changePatientProfil
$changeUserProfile = $users->changeUserProfile();

// regex pour les noms et villes
$regexText = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
// regex téléphone
$regexPhone = '/^(\d){10}$/';
// regex code postal
$regexZipcode = '/^(\d){6}$/';
// regex login
$regexLogin = '/^[a-zA-Z0-9_\- @éèàùëïôê]{6,20}$/';
// regex pour l'adresse mail (autorisation chiffres lettres, obligation de l'@ et .)
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
// déclaration de la variable $message
$message= '';
// déclaration du tableau d'erreur
$formError = array();

if (isset($_POST['update'])) {
    //vérification par double condition
    //Si le parametre existe
         if (isset($_POST['lastname'])) {
             //si le parametre passe la regex
        if (preg_match($regexText, $_POST['lastname'])) {
            // sécurisation par htmlspecialchars du parametre transmis
            $users->lastname = htmlspecialchars($_POST['lastname']);
        } else {
            //Sinon afficher le message
            $formError['lastname'] = ERROR_LASTNAME;
        }
    } else {
        //Sinon afficher le message
        $formError['lastname'] = ERROR_EMPTY_FIELD;
    }
    //vérification par double condition
    if (isset($_POST['firstname'])) {
        if (preg_match($regexText, $_POST['firstname'])) {
            $users->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formError['firstname'] = ERROR_FIRSTNAME;
        }
    } else {
        $formError['firstname'] = ERROR_EMPTY_FIELD;
    }
    //vérification par double condition
    if (isset($_POST['birthdate'])) {
            $users->birthdate = htmlspecialchars($_POST['birthdate']);
            } else {
        $formError['birthdate'] = ERROR_EMPTY_FIELD;
    }
    //vérification par double condition
    if (isset($_POST['address'])) {
            $users->address = htmlspecialchars($_POST['address']);
    } else {
        $formError['phone'] = ERROR_EMPTY_FIELD;
    }
    
    //vérification par double condition
    if (isset($_POST['zipcode'])) {
        if (preg_match($regexZipcode, $_POST['zipcode'])) {
            $users->zipcode = htmlspecialchars($_POST['zipcode']);
        } else {
            $formError['zipcode'] = ERROR_ZIPCODE;
        }
    } else {
        $formError['zipcode'] = ERROR_EMPTY_FIELD;
    }
    //vérification par double condition
    if (isset($_POST['city'])) {
        if (preg_match($regexText, $_POST['city'])) {
            $users->city = htmlspecialchars($_POST['city']);
        } else {
            $formError['city'] = ERROR_CITY;
        }
    } else {
        $formError['city'] = ERROR_EMPTY_FIELD;
    }
    
     //vérification par double condition
    if (isset($_POST['country'])) {
        if (preg_match($regexText, $_POST['country'])) {
            $users->country = htmlspecialchars($_POST['country']);
        } else {
            $formError['country'] = ERROR_COUNTRY;
        }
    } else {
        $formError['country'] = ERROR_EMPTY_FIELD;
    }
    
    //vérification par double condition
     if (isset($_POST['mail'])) {
        if (preg_match($regexMail, $_POST['mail'])) {
            $users->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = ERROR_MAIL;
        }
    } else {
        $formError['mail'] = ERROR_EMPTY_FIELD;
    }
    //vérification par double condition
     if (isset($_POST['phone'])) {
        if (preg_match($regexPhone, $_POST['phone'])) {
            $users->phone = htmlspecialchars($_POST['phone']);
        } else {
            $formError['phone'] = ERROR_PHONE;
        }
    } else {
        $formError['phone'] = ERROR_EMPTY_FIELD;
    }
    
     //vérification par double condition
     if (isset($_POST['login'])) {
        if (preg_match($regexLogin, $_POST['login'])) {
            $users->login = htmlspecialchars($_POST['login']);
        } else {
            $formError['login'] = ERROR_LOGIN;
        }
    } else {
        $formError['phone'] = ERROR_EMPTY_FIELD;
    }
    
    //vérification par  condition
     if (isset($_POST['password'])) {
            $users->password = htmlspecialchars($_POST['password']);
            $formError['password'] = ERROR_PASSWORD;
    } else {
        $formError['password'] = ERROR_EMPTY_FIELD;
    }
    
    //vérification qu'il n'y a pas d'erreur par la fonction count
    if (count($formError) == 0){
        $users->id = $_POST['id'];
        // si la méthode ne renvoie pas d'instance afficher le message
        if (!$users->changeUserProfile()){
            $formError['update'] = 'Il y a eu un problème';
        }
    } 
}
?>
