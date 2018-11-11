<?php
class users extends database {
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '';
    public $address = '';
    public $zipcode = '';
    public $city = '';
    public $country = '';
    public $phone = '';
    public $mail = '';
    public $login = '';
    public $password = '';
    public $search = '';
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }
    
    /**
     * Méthode permettant de faire la connexion de l'utilisateur
     * @return boolean
     */
    public function userConnection() {
        $state = false;
        $query = 'SELECT `id`, `login`, `password` FROM `gleola1_users` WHERE `login` = :login';
        $result = $this->db->prepare($query);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        if ($result->execute()) { //On vérifie que la requête s'est bien exécutée
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            if (is_object($selectResult)) { //On vérifie que l'on a bien trouvé un utilisateur
                // On hydrate
                $this->login = $selectResult->login;
                $this->password = $selectResult->password;
                $this->id = $selectResult->id;
                $state = true;
            }
        }
        return $state;
    }
    /**
     * Méthode permettant l'enregistrement d'un utilisateur
     * @return boolean
     */
    public function registerUser() {
        $query = 'INSERT INTO `gleola1_users` (`lastname`, `firstname`, `birthdate`, `address`, `zipcode`, `city`, `country`, `mail`, `phone`, `login`, `password`, `idRole`) '
                . 'VALUES (:lastname, :firstname, :birthdate, :address, :zipcode, :city, :country, :mail, :phone, :login, :password, 1)';
        $result = $this->db->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':zipcode', $this->zipcode, PDO::PARAM_STR);
        $result->bindValue(':city', $this->city, PDO::PARAM_STR);
        $result->bindValue(':country', $this->country, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $result->execute();
    }

    public function checkIfUserExist(){
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `gleola1_users` WHERE `login` = :login';
        $result = $this->db->prepare($query);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }
    /**
     * Méthode pour recupérer la liste des utilisateurs
     * @return type
     */
    public function getUserList() {
        // on declare un tableau vide
        $getUserList = array();
        $query = 'SELECT `id`, `lastname`, `firstname` FROM `gleola1_users` LIMIT 10';
               $userList=$this->db->query($query);
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
                $query = 'SELECT `id`, `lastname`, `firstname`, `address`, `birthdate`, `phone`, `mail` FROM `gleola1_users` WHERE `id` = :id';
             // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
           $userProfil=$this->db->prepare($query);
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
           $queryUpdateUser = 'UPDATE `gleola1_users` '
                   . 'SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `address` = :address, `zipcode` = :zipcode, `city` = :city, `country` = :country, `phone` = :phone, `mail` = :mail '  
                   . 'WHERE `id` = :id';
           $updateUser = $this->db->prepare($queryUpdateUser);
           // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
           $updateUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
           $updateUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
           $updateUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
           $updateUser->bindValue(':address', $this->address, PDO::PARAM_STR);
           $updateUser->bindValue(':zipcode', $this->zipcode, PDO::PARAM_STR);
           $updateUser->bindValue(':city', $this->city, PDO::PARAM_STR);
           $updateUser->bindValue(':country', $this->country, PDO::PARAM_STR);
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
        $queryDelete = 'DELETE FROM `gleola1_users` WHERE `id` = :id';
        $user = $this->db->prepare($queryDelete);
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
        $query = 'SELECT `id`, `lastname`, `firstname` FROM `gleola1_users` WHERE `lastname` LIKE :lastname';
        $searchUser = $this->db->prepare($query);
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
        $queryResult = $this->db->query('SELECT COUNT(`id`) AS countResults FROM `gleola1_users`');
        if (is_object($queryResult)) {
            $result = $queryResult->fetch(PDO::FETCH_OBJ);
        } else {
            $result = false;
        }
        return $result;
    }
     /**
     * Méthode pour afficher une liste d'utilisateur avec pagination par N
     * @return type
     */
    public function getUsersListByFive($limit, $offset) {
    $result = array();
    $queryRresult = $this->db->prepare('SELECT `id`, `lastname`, `firstname`, `birthdate`, `address`, `zipcode`, `city`, `country`, `phone`, `mail` '
            . 'FROM `gleola1_users` '
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
