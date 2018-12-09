<?php

/**
 * Classe permettant de se connecter à la base de données MYSQL
 */
class database {
// définition des accessibilité inter classe des différentes propriétés
    protected $db;
    private $host = '';
    private $login = '';
    private $password = '';
    private $dbname = '';
    // on crée une methode magique __construct()
    public function __construct() {
        $this->host = HOST;
        $this->login = LOGIN;
        $this->password = PASSWORD;
        $this->dbname = DBNAME;
    }

    /**
     * Méthode permettant de créer l'instance PDO
     */
    protected function dbConnect() {
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';port=3306;dbname=' . $this->dbname . ';charset=UTF8;', $this->login, $this->password);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

}
