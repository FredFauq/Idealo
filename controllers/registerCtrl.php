<?php

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
$errorList = array();

//Appel AJAX
if (isset($_POST['loginVerify'])) {
    include_once '../configuration.php';
    $user = new users();
    $user->login = htmlspecialchars($_POST['loginVerify']);
    echo $user->checkIfUserExist();
} else { //Validation du formulaire
    if (!empty($_POST['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
    } else {
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
    
      if (!empty($_POST['phone'])) {
        $phone = htmlspecialchars($_POST['phone']);
    } else {
        $errorList['phone'] = ERROR_PHONE;
    }
    
    if (!empty($_POST['login'])) {
        $login = htmlspecialchars($_POST['login']);
    } else {
        $errorList['login'] = ERROR_LOGIN;
    }
    
    if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $errorList['password'] = ERROR_PASSWORD;
    }


    if (count($errorList) == 0) {
        $user = new users();
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
        $user->registerUser();
    }
}