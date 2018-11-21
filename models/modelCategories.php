<?php

class users extends database {

    public $id = 0;
    public $nameCategory = '';
    public $search = '';

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }
   /**
 * Méthode permettant de vérifier l'existence de la catègorie
 * @return type boolean
 */
    public function checkIfCategoryExist(){
        $state = false;
        // requête de vérification de la présence du nameCategory par count
        $query = 'SELECT COUNT(`id`) AS `count` FROM `gleola1_categories` WHERE `nameCategory` = :nameCategory';
        $result = $this->db->prepare($query);
        $result->bindValue(':nameCategory', $this->nameCategory, PDO::PARAM_STR);
        // On vérifie que la requête s'est bien exécutée
        if ($result->execute()) {
            // on récupère le réxultat par un fetch
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }
     /**
     * Méthode permettant l'enregistrement d'une catègorie
     * @return boolean
     */
    public function addCategory() {
        // requête d'insertion des valeurs d'une catègorie
        $query = 'INSERT INTO `gleola1_categories` (`nameCategory`) '
                . 'VALUES (:nameCategory)';
        // on attribue les valeurs via bindValue des marqueurs nominatifs et on recupère les attributs de la classe via $this
        $result = $this->db->prepare($query);
        $result->bindValue(':nameCategory', $this->nameCategory, PDO::PARAM_STR);
        return $result->execute();
    }
    /**
     * Méthode permettant la suppression d'une catègorie
     * @return boolean
     */
    public function deleteCategory() {
        // requête  de suppression d'une catègorie
        $queryDelete = 'DELETE FROM `gleola1_categories` WHERE `id` = :id';
        // on attribue les valeurs via bindValue des marqueurs nominatifs et on recupère les attributs de la classe via $this
        $result = $this->db->prepare($queryDelete);
        $result->bindvalue(':id', $this->id, PDO::PARAM_INT);
        // On exécute la requête.
        return $result->execute();
    }
    /**
     * Méthode permettant l'update d'une catègorie
     * @return boolean
     */
    public function updateCategory() {
        // Préparation de la requête d'update d'une catègorie dans la BDD.
        $queryUpdateCategory = 'UPDATE `gleola1_categories` '
                . 'SET `nameCategory` = :nameCategory '
                . 'WHERE `id` = :id';
        // si il y a une erreur on renvoie le tableau vide
        if (is_object($queryUpdateCategory)) {
            $result = $this->db->prepare($queryUpdateCategory);
            // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
            $result->bindValue(':nameCategory', $this->nameCategory, PDO::PARAM_STR);
            // On exécute la requête.
            return $result->execute();
        } else {
            $result = false;
        }
    }