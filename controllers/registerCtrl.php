<?php

$lastname = '';
$firstname = '';
$mail = '';
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

    if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        $errorList['mail'] = ERROR_MAIL;
    }

    if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $errorList['password'] = ERROR_PASSWORD;
    }

    if (!empty($_POST['login'])) {
        $login = htmlspecialchars($_POST['login']);
    } else {
        $errorList['login'] = ERROR_LOGIN;
    }

    if (count($errorList) == 0) {
        $user = new users();
        $user->lastname = $lastname;
        $user->firstname = $firstname;
        $user->mail = $mail;
        $user->password = $password;
        $user->login = $login;
        $user->userRegister();
    }
}