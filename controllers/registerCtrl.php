<?php
// on initialise les variables
$lastname = '';
$firstname = '';
$birthdate = '';
$address = '';
$zipcode = '';
$city = '';
$country = '';
$mail = '';
$phone = '';
$login = '';
$password = '';
$passwordVerify = '';
$message= '';
$errorList = array();
// regex pour les textes
$regexText = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
// regex pour le téléphone
$regexPhone = '/^(\d){10}/';
// regex pour l'identifiant
$regexLogin = '/^[a-zA-Z0-9_\- @éèàùëïôê]{6,20}/';
// regex pour le code postal
$regexZipcode = '/[0-9]{5}/';

// on vérifie la concordance du login
if (isset($_POST['loginVerify'])) {
    include_once '../configuration.php';
    // on instancie la classe users dans une variable
    $user = new users();
    // on passe la valeur et sécurise par htmlspecialchars l'entrée du champ saisi
    $user->login = htmlspecialchars($_POST['loginVerify']);
} else { 
//Validation du formulaire
    // on vérifie que la saisie existe et n'est pas vide
    if (!empty($_POST['lastname'])) {
        // condition de passage à la regex
        if (preg_match($regexText, $_POST['lastname'])) {
        // on sécurise par htmlspecialchars
        $lastname = htmlspecialchars($_POST['lastname']);
        } else {
        // sinon on affiche une erreur
        $errorList['lastname'] = ERROR_LASTNAME;
        }
    } else {
        // sinon on affiche une erreur de champ vide
        $errorList['lastname'] = ERROR_EMPTY_FIELD;
    }

    if (!empty($_POST['firstname'])) {
        // condition de passage à la regex
        if (preg_match($regexText, $_POST['firstname'])) {
        // on sécurise par htmlspecialchars
        $firstname = htmlspecialchars($_POST['firstname']);
        } else {
        // sinon on affiche une erreur
        $errorList['firstname'] = ERROR_FIRSTNAME;
        }
    } else {
        // sinon on affiche une erreur de champ vide
        $errorList['firstname'] = ERROR_EMPTY_FIELD;
    }
    
     if (!empty($_POST['birthdate'])) {
        $birthdate = htmlspecialchars($_POST['birthdate']);
    } else {
        $errorList['birthdate'] = ERROR_EMPTY_FIELD;
    }
    
      if (!empty($_POST['address'])) {
        $address = htmlspecialchars($_POST['address']);
    } else {
        $errorList['address'] = ERROR_EMPTY_FIELD;
    }
    
      if (!empty($_POST['zipcode'])) {
          // condition de passage à la regex
        if (preg_match($regexZipcode, $_POST['zipcode'])) {
        $zipcode = htmlspecialchars($_POST['zipcode']);
    } else {
        $errorList['zipcode'] = ERROR_ZIPCODE;
    }
    
    } else {
      $errorList['zipcode'] = ERROR_EMPTY_FIELD;  
    }
    
      if (!empty($_POST['city'])) {
          if (preg_match($regexText, $_POST['city'])) {
        $city = htmlspecialchars($_POST['city']);
    } else {
        $errorList['city'] = ERROR_CITY;
    }
      } else {
          $errorList['city'] = ERROR_EMPTY_FIELD; 
      }
    
      if (!empty($_POST['country'])) {
          if (preg_match($regexText, $_POST['country'])) {
        $country = htmlspecialchars($_POST['country']);
    } else {
        $errorList['country'] = ERROR_COUNTRY;
    }
      } else {
          $errorList['country'] = ERROR_EMPTY_FIELD; 
      }
    
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        $errorList['mail'] = ERROR_MAIL;
    }
    } else {
        $errorList['mail'] = ERROR_EMPTY_FIELD; 
    }
      if (!empty($_POST['phone'])) {
          if(preg_match($regexPhone, $_POST['phone'])) {
        $phone = htmlspecialchars($_POST['phone']);
    } else {
        $errorList['phone'] = ERROR_PHONE;
    }
    } else {
       $errorList['phone'] = ERROR_EMPTY_FIELD;    
      }
    if (!empty($_POST['login'])) {
        if(preg_match($regexLogin, $_POST['login'])) {
    
        $login = htmlspecialchars($_POST['login']);
            
    } else {
        $errorList['login'] = ERROR_LOGIN;
    }
} else {
     $errorList['login'] = ERROR_EMPTY_FIELD; 
}
    
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
    } else {
        $errorList['password'] = ERROR_EMPTY_FIELD;
    }
    if (isset($_POST['passwordVerify'])) {
        
        if ($_POST['password'] != $_POST['passwordVerify']) {
            $errorList['passwordVerify'] = ERROR_DIFFERENT_PASSWORD;
        }
    } else {
        $errorList['passwordVerify'] = ERROR_EMPTY_FIELD;
    }


// S'il n'y a pas d'erreur
    if (count($errorList) == 0) {
        // on instancie la classe users
        $user = new users();
        // on hydrate les valeurs
        $user->lastname = $lastname;
        $user->firstname = $firstname;
        $user->birthdate = $birthdate;
        $user->address = $address;
        $user->zipcode = $zipcode;
        $user->city = $city;
        $user->country = $country;
        $user->mail = $mail;
        $user->phone = $phone;
        $user->login = $login;
        $user->password = $password;
        // on éxécute la méthode registerUser
        $user->registerUser();
        // si l'enregistrement se fait on afficche le message de réusssite
        $message = USER_REGISTRATION_SUCCESS;
      
    }
}