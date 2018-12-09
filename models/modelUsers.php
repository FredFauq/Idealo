<?php
/* On crée une class users qui hérite de la classe database via extends
 * La classe users va nous permettre d'accéder à la table users
 */
class users extends database {
    // Création d'attributs qui correspondent à chacun des champs de la table users
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
    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
        $this->dbConnect();
    }
    /**
     * Méthode permettant l'enregistrement d'un utilisateur
     * @return boolean
     */
    public function registerUser() {
        // requête d'insertion des valeurs de l'enregistrement
        $query = 'INSERT INTO `gleola1_users` (`lastname`, `firstname`, `birthdate`, `address`, `zipcode`, `city`, `country`, `mail`, `phone`, `login`, `password`, `idRole`) '
                . 'VALUES (:lastname, :firstname, :birthdate, :address, :zipcode, :city, :country, :mail, :phone, :login, :password, 1)';
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
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
        // on utilise la méthode execute() via un return
        return $result->execute();
    }
    
    /**
     * Méthode permettant de faire la connexion de l'utilisateur
     * @return boolean
     */
    public function userConnection() {
       $state = false;
        // requête de récupération du login et du password par un select
        $query = 'SELECT `gleola1_users`.`id`, `gleola1_users`.`login`, `gleola1_users`.`password`, `gleola1_users`.`idRole` AS `role` '
                . 'FROM `gleola1_users` '
                . 'INNER JOIN `gleola1_role` '
                . 'ON `gleola1_users`.`idRole` = `gleola1_role`.`id` '
                . 'WHERE `login` = :login ';
        $result = $this->db->prepare($query);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        // On vérifie que la requête s'est bien exécutée
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            // On vérifie que l'on a bien trouvé un utilisateur
            if (is_object($selectResult)) { 
                // dans ce cas on hydrate
                $this->login = $selectResult->login;
                $this->password = $selectResult->password;
                $this->role = $selectResult->role;
                $this->id = $selectResult->id;
                // on défini la variable $state égale à vrai
                $state = true;
            }
        }
        // on retourne la variable $state (booléen)
        return $state;
    }
/**
 * Méthode permettant de vérifier l'existence de l'utilisateur
 * @return type boolean
 */
    public function checkIfUserExist(){
        $state = false;
        // requête de vérification de la présence du login par count
        $query = 'SELECT COUNT(`id`) AS `count` FROM `gleola1_users` WHERE `login` = :login';
        $result = $this->db->prepare($query);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        // On vérifie que la requête s'est bien exécutée
        if ($result->execute()) {
            // on récupère le réxultat par un fetch
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        // on retourne la variable $state (booléen)
        return $state;
    }
    /**
     * Méthode pour recupérer la liste des utilisateurs
     * @return type
     */
    public function getUserList() {
        // on declare un tableau vide
        $getUserList = array();
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `address`, `zipcode`, `city`, `country`, `mail`, `phone` FROM `gleola1_users` LIMIT 5';
               $userList=$this->db->query($query);
         // on vérifie l'instanciation de $userList
        if(is_object($userList)){
            // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
            $getUserList=$userList->fetchAll(PDO::FETCH_OBJ);
        }
        // on retourne le résultat
        return $getUserList;
    }
    /**
     * Méthode pour recupérer un utilisateur par son id
     * @return type
     */
    public function getUserProfileByID() {
                $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `address`, `zipcode`, `city`, `country`, `mail`, `phone`, `login`, `password` FROM `gleola1_users` WHERE `id` = :id';
             // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
           $userProfile=$this->db->prepare($query);
         $userProfile->bindValue(':id', $this->id, PDO::PARAM_INT);
           // on utilise la méthode execute() via un return
       $userProfile->execute();
            // on vérifie l'instanciation de $userProfile
            if (is_object($userProfile)){
                /* On crée la variable $getUserProfilByID qui va nous permettre de retourner le resultat 
             * La fonction fetch permet d'afficher la ligne de la requète que je souhaite récupérer
             */
            $getUserProfileByID = $userProfile->fetch(PDO::FETCH_OBJ);
            }
        // on renvoie le résultat   
        return $getUserProfileByID;
    }
    /**
     * Méthode pour modifier un profil utilisateur
     * @return type
     */
    public function changeUserProfile() {
           // Préparation de la requête d'update de patient dans la BDD.
           $queryUpdateUser = 'UPDATE `gleola1_users` '
                   . 'SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `address` = :address, `zipcode` = :zipcode, `city` = :city, `country` = :country, `phone` = :phone, `mail` = :mail, `login` = :login '  
                   . 'WHERE `id` = :id';
           $updateUser = $this->db->prepare($queryUpdateUser);
           // on attribue les valeurs via bindValue  et on recupère les attributs de la classe via $this
           $updateUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
           $updateUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
           $updateUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
           $updateUser->bindValue(':address', $this->address, PDO::PARAM_STR);
           $updateUser->bindValue(':zipcode', $this->zipcode, PDO::PARAM_STR);
           $updateUser->bindValue(':city', $this->city, PDO::PARAM_STR);
           $updateUser->bindValue(':country', $this->country, PDO::PARAM_STR);
           $updateUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
           $updateUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
           $updateUser->bindValue(':login', $this->login, PDO::PARAM_STR);
           $updateUser->bindValue(':id', $this->id, PDO::PARAM_INT);
           // On exécute la requête.
           return $updateUser->execute();     
    } 
    /**
     * Méthode pour supprimer un utilisateur
     * @return type
     */
    public function deleteUserProfile() {
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
    public function searchUser($search) {
        //Déclaration du tableau vide
       $resultSearch = array();
       // définition de la variable contenant la requête
        $query = 'SELECT `id`, `lastname`, `firstname` FROM `gleola1_users` WHERE `lastname` LIKE :lastname';
        // 
        $searchUser = $this->db->prepare($query);
        // on attribue au marqueur nominatif lastname la valeur de $search
        $searchUser->bindvalue(':lastname', '%' . $this->search . '%', PDO::PARAM_STR);
    
         // on vérifie l'instanciation de $searchUser
        if(is_object($searchUser)){
           if ($searchUser->execute()) {
            // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::
            $resultSearch = $searchUser->fetchAll(PDO::FETCH_OBJ);
        } else {
            // si le tableau est vide on défini la variable de la recherche à faux (booléen)
            $resultSearch = FALSE;
        }
        // on renvoie le résultat
        return $resultSearch;
    } else {
        // si le tableau est vide on défini la variable de la recherche à faux (booléen)
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
        // si il y a bien une instance de $queryResult
        if (is_object($queryResult)) {
            $result = $queryResult->fetch(PDO::FETCH_OBJ);
        } else {
            $result = false;
        }
        return $result;
    }
     /**
     * Méthode pour afficher une liste d'utilisateur avec pagination par N utilisateurs
     * @return type
     */
    public function getUsersListByN($limit, $offset) {
    // initialisation du tableau $result
    $result = array();
    $queryResult = $this->db->prepare('SELECT `id`, `lastname`, `firstname`, `birthdate`, `address`, `zipcode`, `city`, `country`, `phone`, `mail` '
            . 'FROM `gleola1_users` '
            . 'LIMIT :limit OFFSET :offset');
    // on attribue au marqueur nominatif limit la valeur de $limit
    $queryResult->bindvalue(':limit', $limit, PDO::PARAM_INT);
    // on attribue au marqueur nominatif offset la valeur de $offset
    $queryResult->bindvalue(':offset', $offset, PDO::PARAM_INT);
    // si la méthode execute() fonctionne
    if ($queryResult->execute()){
        // si il y a bien une instance de $queryResult
        if (is_object($queryResult)){
            // on récupére une instance d'un tableau des résultats par le fetchAll
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        } else {
            // sinon on défini la variable $result à faux (booléen)
            $result = false;
        }
    } else {
        // on défini la variable $result égale à faux (booléen)
     $result = false;
    }
    // on retourne le résultat (booléen) de $result
    return $result;
    }
}

