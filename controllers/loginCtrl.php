<?php
$login = '';
$errorList = array();
$message='';

if (!empty($_POST['login'])) {
    $login = htmlspecialchars($_POST['login']);
}else{
    $errorList['login'] = ERROR_LOGIN;
}

if (!empty($_POST['password'])) {
    $password = $_POST['password'];
}else{
    $errorList['password'] = ERROR_LOGIN;
}

if(count($errorList) == 0){
    $user = new users();
    $user->login = $login;
    if($user->userConnection()){
        if(password_verify($password, $user->password)){
            //la connexion se fait
            $message = USER_CONNECTION_SUCCESS;
            //On rempli la session avec les attributs de l'objet issus de l'hydratation
            $_SESSION['login'] = $user->login;
            $_SESSION['lastname'] = $user->lastname;
            $_SESSION['firstname'] = $user->firstname;
            $_SESSION['id'] = $user->id;
            $_SESSION['isConnect'] = true;
        }else{
            //la connexion échoue
            $message = USER_CONNECTION_ERROR;
        }
    }
}
