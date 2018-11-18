<?php

class users extends database {

    public $id = 0;
    public $labelProduct = '';
    public $textProduct = '';
    public $priceProduct = '';
    public $barcodeProduct = '';
    public $imgProduct = '';
    public $search = '';

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    /**
 * Méthode permettant de vérifier l'existence du produit
 * @return type boolean
 */
    public function checkIfProductExist(){
        $state = false;
        // requête de vérification de la présence du labelProduct par count
        $query = 'SELECT COUNT(`id`) AS `count` FROM `gleola1_users` WHERE `labelProduct` = :labelProduct';
        $result = $this->db->prepare($query);
        $result->bindValue(':labelProduct', $this->labelProduct, PDO::PARAM_STR);
        // On vérifie que la requête s'est bien exécutée
        if ($result->execute()) {
            // on récupère le réxultat par un fetch
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }
    /**
     * Méthode permettant l'enregistrement d'un produit
     * @return boolean
     */
    public function addProduct() {
        // requête d'insertion des valeurs d'un produit
        $query = 'INSERT INTO `gleola1_Products` (`labelProduct`, `textProduct`, `priceProduct`, `barcodeProduct`, `imgProduct`) '
                . 'VALUES (:labelProduct, :textProduct, :priceProduct, :barcodeProduct, :imgProduct)';
        // on attribue les valeurs via bindValue des marqueurs nominatifs et on recupère les attributs de la classe via $this
        $result = $this->db->prepare($query);
        $result->bindValue(':labelProduct', $this->labelProduct, PDO::PARAM_STR);
        $result->bindValue(':textProduct', $this->textProduct, PDO::PARAM_STR);
        $result->bindValue(':priceProduct', $this->priceProduct, PDO::PARAM_STR);
        $result->bindValue(':barcodeProduct', $this->barcodeProduct, PDO::PARAM_STR);
        $result->bindValue(':imgProduct', $this->imgProduct, PDO::PARAM_STR);
        // On exécute la requête.
        return $result->execute();
    }

    /**
     * Méthode permettant la suppression d'un produit
     * @return boolean
     */
    public function deleteProduct() {
        // requête  de suppression d'un produit
        $queryDelete = 'DELETE FROM `gleola1_Products` WHERE `id` = :id';
        // on attribue les valeurs via bindValue des marqueurs nominatifs et on recupère les attributs de la classe via $this
        $result = $this->db->prepare($queryDelete);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $result->bindvalue(':id', $this->id, PDO::PARAM_INT);
        // On exécute la requête.
        return $result->execute();
    }

    /**
     * Méthode permettant l'update d'un produit
     * @return boolean
     */
    public function updateProduct() {
        // Préparation de la requête d'update d'un produit dans la BDD.
        $queryUpdateProduct = 'UPDATE `gleola1_Products` '
                . 'SET `labelProduct` = :labelProduct, `textProduct` = :textProduct, `priceProduct` = :priceProduct, `barcodeProduct` = :barcodeProduct '
                . 'WHERE `id` = :id';
        // si il y a une erreur on renvoie le tableau vide
        if (is_object($queryUpdateProduct)) {
            $result = $this->db->prepare($queryUpdateProduct);
            // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
            $result->bindValue(':labelProduct', $this->labelProduct, PDO::PARAM_STR);
            $result->bindValue(':textProduct', $this->textProduct, PDO::PARAM_STR);
            $result->bindValue(':priceProduct', $this->priceProduct, PDO::PARAM_STR);
            $result->bindValue(':barcodeProduct', $this->barcodeProduct, PDO::PARAM_STR);
            $result->bindValue(':imgProduct', $this->imgProduct, PDO::PARAM_STR);
            // On exécute la requête.
            return $result->execute();
        } else {
            $result = false;
        }
    }

    /**
     * Méthode permettant d'obtenir le nombre de produits
     * @return boolean
     */
    public function numberOfProduct() {
        // Préparation de la requête pour  obtenir le nombre de produits dans la BDD.
        $queryNumberOfProduct = 'SELECT COUNT(`id`) AS countResults FROM `gleola1_Products`';
        // on recupère les attributs de la classe via $this
        $result = $this->db->query($queryNumberOfProduct);
        // si il y a une erreur on renvoie le tableau vide
        if (is_object($queryNumberOfProduct)) {
            $result = $queryNumberOfProduct->fetch(PDO::FETCH_OBJ);
        } else {
            $result = false;
        }
        // On exécute la requête.
        return $result;
    }
    /**
     * Méthode pour recupérer la liste des produits
     * @return type
     */
    public function getProductsList() {
        // on declare un tableau vide
        getProductsList = array();
        $query = 'SELECT `id`, `labelProduct`, `priceProduct`, `barcodeProduct` FROM `gleola1_Products` LIMIT 5';
               $result=$this->db->query($query);
         // si il y a une erreur on renvoie le tableau vide
        if(is_object(getProductsList)) {
            $result = getProductsList->fetchAll(PDO::FETCH_OBJ);
        }
        // on renvoie le résultat
        return getProductsList;
    }
    /**
     * Méthode permettant de rechercher un produit
     * @return boolean
     */
    public function searchProduct() {
        //Déclaration du tableau vide
        $resultSearch = array();
        // Préparation de la requête pour rechercher un produit dans la BDD.
        $query = 'SELECT `id`, `labelProduct` FROM `gleola1_Products` WHERE `labelProduct` LIKE :labelProduct';
        $searchProduct = $this->db->prepare($query);
        $searchProduct->bindvalue(':labelProduct', '%' . $this->search . '%', PDO::PARAM_STR);

        // si il y a une erreur on renvoie le tableau vide
        if (is_object($searchProduct)) {
            if ($searchProduct->execute()) {
                $searchProduct = $searchProduct->fetchAll(PDO::FETCH_OBJ);
            } else {
                $searchProduct = FALSE;
            }
            // on renvoie le résultat
            return $searchProduct;
        } else {
            $searchProduct = FALSE;
        }
        return $searchProduct;
    }

    /**
     * Méthode permettant de rechercher des produits par 5
     * @return boolean
     */
    public function getProductByFive($limit, $offset) {
        //Déclaration du tableau vide
        $result = array();
        // Préparation de la requête pour obtenir la liste de produit par 5 dans la BDD.
        $queryRresult = $this->db->prepare('SELECT `id`, `labelProduct`, `textProduct`, `priceProduct`, `barcodeProduct`, `imgProduct` '
                . 'FROM `gleola1_Products` '
                . 'LIMIT :limit OFFSET :offset');
        $queryRresult->bindvalue(':limit', $limit, PDO::PARAM_INT);
        $queryRresult->bindvalue(':offset', $offset, PDO::PARAM_INT);
        if ($queryRresult->execute()) {
            // si il y a une erreur on renvoie le tableau vide
            if (is_object($queryRresult)) {
                $result = $queryRresult->fetchAll(PDO::FETCH_OBJ);
            } else {
                $result = false;
            }
        } else {
            $result = false;
        }
        // on renvoie le résultat
        return $result;
    }

}
