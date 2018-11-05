<?php
class users extends database {
    public $id;
    public $lastname;
    public $firstname;
    public $address;
    public $birthdate;
    public $phone;
    public $mail;
    public $search;
    public function __construct() {
        parent::__construct();
    }
    /**
     * Méthode pour ajouter un utilisateur
     * @return type
     */
    public function addUser() {
        $query = 'INSERT INTO `users`(`lastname`, `firstname`, `address`, `birthdate`, `phone`, `mail`) '
                . 'VALUES (:lastname, :firstname, :address, :birthdate, :phone, :mail)';
        $insertUser = $this->connexion->prepare($query);
        $insertUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $insertUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $insertUser->bindValue(':address', $this->address, PDO::PARAM_STR);
        $insertUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $insertUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $insertUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $insertUser->execute();
    }
    /**
     * Méthode pour recupérer la liste des utilisateurs
     * @return type
     */
    public function getUserList() {
        // on declare un tableau vide
        $getUserList = array();
        $query = 'SELECT `id`, `lastname`, `firstname` FROM `users` LIMIT 10';
               $userList=$this->connexion->query($query);
         // si il y a une erreur on renvoie le tableau vide
        if(is_object($patientList)){
            $getUserList=$UserList->fetchAll(PDO::FETCH_OBJ);
        }
        // on renvoie le résultat
        return $getUserList;
    }
    /**
     * Méthode pour recupérer un utilisateur par son id
     * @return type
     */
    public function getUserProfilByID() {
                $query = 'SELECT `id`, `lastname`, `firstname`, `address`, `birthdate`, `phone`, `mail` FROM `users` WHERE `id` = :id';
             // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
           $userProfil=$this->connexion->prepare($query);
         $userProfil->bindValue(':id', $this->id, PDO::PARAM_INT);
           // on utilise la méthode execute() via un return
       $userProfil->execute();
            if (is_object($userProfil)){
                /* On crée la variable $getUserProfilByID qui va nous permettre de retourner le resultat 
             * La fonction fetch permet d'afficher la ligne de la requète que je souhaite récupérer
             */
            $getUserProfilByID = $userProfil->fetch(PDO::FETCH_OBJ);
            }
        // on renvoie le résultat   
        return $getUserProfilByID;
    }
    /**
     * Méthode pour modifier un profil utilisateur
     * @return type
     */
    public function changeUserProfil() {
           // Préparation de la requête d'update de patient dans la BDD.
           $queryUpdateUser = 'UPDATE `users` '
                   . 'SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail ' 
                   . 'WHERE `id` = :id';
           $updateUser = $this->connexion->prepare($queryUpdateUser);
           // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
           $updateUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
           $updateUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
           $updateUser->bindValue(':address', $this->address, PDO::PARAM_STR);
           $updateUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
           $updateUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
           $updateUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
           $updateUser->bindValue(':id', $this->id, PDO::PARAM_INT);
           // On exécute la requête.
           return $updateUser->execute();     
    } 
    /**
     * Méthode pour supprimer un utilisateur
     * @return type
     */
    public function deleteUserProfil() {
        // preparation de la requête Delete du user dans la BDD
        $queryDelete = 'DELETE FROM `users` WHERE `id` = :id';
        $user = $this->connexion->prepare($queryDelete);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $user->bindvalue(':id', $this->id, PDO::PARAM_INT);
         // On exécute la requête.
           return $user->execute(); 
    }
    /**
     * Méthode pour rechercher un utilisateur
     * @return type
     */
    public function searchUser() {
        //Déclaration du tableau vide
       $resultSearch = array();
        $query = 'SELECT `id`, `lastname`, `firstname` FROM `users` WHERE `lastname` LIKE :lastname';
        $searchUser = $this->connexion->prepare($query);
        $searchUser->bindvalue(':lastname', '%' . $this->search . '%', PDO::PARAM_STR);
    
         // si il y a une erreur on renvoie le tableau vide
        if(is_object($searchUser)){
           if ($searchUser->execute()) {
            $resultSearch = $searchUser->fetchAll(PDO::FETCH_OBJ);
        } else {
            $resultSearch = FALSE;
        }
        // on renvoie le résultat
        return $resultSearch;
    } else {
        $resultSearch = FALSE;
    }
    return $resultSearch;
    }
    /**
     * Méthode pour calculer le nombre d'utilisateur dans la table users
     * @return type
     */
    public function numberOfResults() {
        $queryResult = $this->connexion->query('SELECT COUNT(`id`) AS countResults FROM `users`');
        if (is_object($queryResult)) {
            $result = $queryResult->fetch(PDO::FETCH_OBJ);
        } else {
            $result = false;
        }
        return $result;
    }
     /**
     * Méthode pour afficher une liste d'utilisateur avec pagination par 5
     * @return type
     */
    public function getUsersListByFive($limit, $offset) {
    $result = array();
    $queryRresult = $this->connexion->prepare('SELECT `id`, `lastname`, `firstname`, `address`, `birthdate`, `phone`, `mail` '
            . 'FROM `users` '
            . 'LIMIT :limit OFFSET :offset');
    $queryRresult->bindvalue(':limit', $limit, PDO::PARAM_INT);
    $queryRresult->bindvalue(':offset', $offset, PDO::PARAM_INT);
    if ($queryRresult->execute()){
        if (is_object($queryRresult)){
            $result = $queryRresult->fetchAll(PDO::FETCH_OBJ);
        } else {
            $result = false;
        }
    } else {
     $result = false;
    }
    return $result;
    }
     }

?>
