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
// regex
$regexPhone = '/^(\d){10}$/';
$regexLogin = '/^[a-zA-Z0-9_\- @éèàùëïôê]{6,20}$/';

// on vérifie la concordance du login
if (isset($_POST['loginVerify'])) {
    include_once '../configuration.php';
    // on instancie la classe users dans une variable
    $user = new users();
    // on passe la valeur et sécurise par htmlspecialchars l'entrée du champ saisi
    $user->login = htmlspecialchars($_POST['loginVerify']);
    // 
    echo $user->checkIfUserExist();
} else { 
//Validation du formulaire
    // on vérifie que la saisie existe et n'est pas vide
    if (!empty($_POST['lastname'])) {
        // on sécurise par htmlspecialchars
        $lastname = htmlspecialchars($_POST['lastname']);
    } else {
        // sinon on affiche une erreur
        $errorList['lastname'] = ERROR_LASTNAME;
    }

    if (!empty($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
    } else {
        $errorList['firstname'] = ERROR_FIRSTNAME;
    }
    
     if (!empty($_POST['birthdate'])) {
        $birthdate = htmlspecialchars($_POST['birthdate']);
    } else {
        $errorList['birthdate'] = ERROR_BIRTHDATE;
    }
    
      if (!empty($_POST['address'])) {
        $address = htmlspecialchars($_POST['address']);
    } else {
        $errorList['address'] = ERROR_ADDRESS;
    }
    
      if (!empty($_POST['zipcode'])) {
        $zipcode = htmlspecialchars($_POST['zipcode']);
    } else {
        $errorList['zipcode'] = ERROR_ZIPCODE;
    }
    
      if (!empty($_POST['city'])) {
        $city = htmlspecialchars($_POST['city']);
    } else {
        $errorList['city'] = ERROR_CITY;
    }
    
      if (!empty($_POST['country'])) {
        $country = htmlspecialchars($_POST['country']);
    } else {
        $errorList['country'] = ERROR_COUNTRY;
    }
    
    if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        $errorList['mail'] = ERROR_MAIL;
    }
    
      if (!empty($_POST['phone']) && preg_match($regexPhone, $phone)) {
        $phone = htmlspecialchars($_POST['phone']);
    } else {
        $errorList['phone'] = ERROR_PHONE;
    }
    
    if (!empty($_POST['login']) && preg_match($regexLogin, $login)) {
        $login = htmlspecialchars($_POST['login']);
    } else {
        $errorList['login'] = ERROR_LOGIN;
    }
    
    if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $errorList['password'] = ERROR_PASSWORD;
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
        header('location: index.php');
        exit;
        // si l'enregistrement se fait on afficche le message de réusssite
        $message = USER_REGISTRATION_SUCCESS;
    }
}