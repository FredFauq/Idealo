<?php
$login = '';
$errorList = array();
$message = '';
// on vérifie que la saisie existe et n'est pas vide
if (!empty($_POST['login'])) {
    // on sécurise par htmlspecialchars
    $login = htmlspecialchars($_POST['login']);
} else {
    // sinon on affiche une erreur
    $errorList['login'] = ERROR_LOGIN;
}
if (!empty($_POST['password'])) {
    $password = htmlspecialchars($_POST['password']);
} else {
    $errorList['password'] = ERROR_PASSWORD;
}
// on vérifie qu'il n'y a pas d'erreur
 if (count($errorList) == 0) {
    // on instancie la classe users
    $user = new users();
    // on passe la valeur du champ
    $user->login = $login;
    // si la méthode userConnection est validée
    if ($user->userConnection()) {
        // si le password est valable
        if (password_verify($password, $user->password)) {
            // si la connexion se fait on afficche le message de réusssite
            $message = USER_CONNECTION_SUCCESS;
            // démarrage de cession
            session_start();
            // On rempli la session avec les attributs de l'objet issus de l'hydratation
            $_SESSION['login'] = $user->login;
            $_SESSION['id'] = $user->id;
            $_SESSION['role'] = $user->role;
            $_SESSION['isConnect'] = true;
            // si la variable de session role = 2 c'est l'administrateur
            if($_SESSION['role'] == 2){
                // on redirige sur la page administration
                header('location: menuAdmin.php');
                exit();
                } 
                // si la variable de session role = 1 c'est un utilisateur
                if ($_SESSION['role'] == 1){
                // on redirige sur la page index
               header('location: index.php');
                exit(); 
                }
        } else {
        // si la connexion échoue on affiche le message d'erreur
        $message = USER_CONNECTION_ERROR;
    }
}
}
