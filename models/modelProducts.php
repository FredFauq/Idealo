<?php
/* On crée une class products qui hérite de la classe database via extends
 * La classe products va nous permettre d'accéder à la table products
 */
class products extends database {
// Création d'attributs qui correspondent à chacun des champs de la table products
    public $id = 0;
    public $labelProduct = '';
    public $textProduct = '';
    public $priceProduct = '';
    public $barcodeProduct = '';
    public $imgProduct = '';
    public $nameCategory = '';
    public $search = '';
    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
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
        $query = 'SELECT COUNT(`id`) AS `count` FROM `gleola1_products` WHERE `labelProduct` = :labelProduct';
        $result = $this->db->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
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
        $query = 'INSERT INTO `gleola1_products` (`labelProduct`, `textProduct`, `priceProduct`, `barcodeProduct`, `imgProduct`, `nameCategory`) '
                . 'VALUES (:labelProduct, :textProduct, :priceProduct, :barcodeProduct, :imgProduct, :nameCategory)';
        $result = $this->db->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $result->bindValue(':labelProduct', $this->labelProduct, PDO::PARAM_STR);
        $result->bindValue(':textProduct', $this->textProduct, PDO::PARAM_STR);
        $result->bindValue(':priceProduct', $this->priceProduct, PDO::PARAM_STR);
        $result->bindValue(':barcodeProduct', $this->barcodeProduct, PDO::PARAM_STR);
        $result->bindValue(':imgProduct', $this->imgProduct, PDO::PARAM_STR);
        $result->bindValue(':nameCategory', $this->nameCategory, PDO::PARAM_STR);
        // On exécute la requête en utilisant la méthode execute() via un return
        return $result->execute();
    }

    /**
     * Méthode permettant la suppression d'un produit
     * @return boolean
     */
    public function deleteProduct() {
        // requête  de suppression d'un produit
        $queryDelete = 'DELETE FROM `gleola1_products` WHERE `id` = :id';
        // on attribue les valeurs via bindValue des marqueurs nominatifs et on recupère les attributs de la classe via $this
        $result = $this->db->prepare($queryDelete);
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
        $queryUpdateProduct = 'UPDATE `gleola1_products` '
                . 'SET `labelProduct` = :labelProduct, `textProduct` = :textProduct, `priceProduct` = :priceProduct, `barcodeProduct` = :barcodeProduct, `nameCategory` = :nameCategory '
                . 'WHERE `id` = :id';
        // on vérifie l'instanciation de $queryUpdateProduct
        if (is_object($queryUpdateProduct)) {
            $result = $this->db->prepare($queryUpdateProduct);
            // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
            $result->bindValue(':labelProduct', $this->labelProduct, PDO::PARAM_STR);
            $result->bindValue(':textProduct', $this->textProduct, PDO::PARAM_STR);
            $result->bindValue(':priceProduct', $this->priceProduct, PDO::PARAM_STR);
            $result->bindValue(':barcodeProduct', $this->barcodeProduct, PDO::PARAM_STR);
            $result->bindValue(':imgProduct', $this->imgProduct, PDO::PARAM_STR);
            $result->bindValue(':nameCategory', $this->nameCategory, PDO::PARAM_STR);
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
    public function numberOfResults() {
        // Préparation de la requête pour  obtenir le nombre de produits dans la BDD.
        $query = 'SELECT COUNT(`id`) AS countResults FROM `gleola1_products`';
        // on recupère les attributs de la classe via $this
        $queryResult = $this->db->query($query);
        // on vérifie l'instanciation de $queryResult
        if (is_object($queryResult)) {
            $result = $queryResult->fetch(PDO::FETCH_OBJ);
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
        $productsList = array();
        $query = 'SELECT `id`, `labelProduct`, `textProduct`, `priceProduct`, `barcodeProduct`, `imgProduct`, `nameCategory` FROM `gleola1_products` LIMIT 5';
               $productsList = $this->db->query($query);
         // on vérifie l'instanciation de $getProductsList
        if(is_object($productsList)) {
            $getProductsList = $productsList->fetchAll(PDO::FETCH_OBJ);
        }
        // on renvoie le résultat
        return $getProductsList;
    }
    /**
     * Méthode permettant de rechercher un produit
     * @return boolean
     */
    public function searchProduct() {
        //Déclaration du tableau vide
        $resultSearch = array();
        // Préparation de la requête pour rechercher un produit dans la BDD.
        $query = 'SELECT `id`, `labelProduct` FROM `gleola1_products` WHERE `labelProduct` LIKE :labelProduct';
        $searchProduct = $this->db->prepare($query);
        $searchProduct->bindvalue(':labelProduct', '%' . $this->search . '%', PDO::PARAM_STR);

        // on vérifie l'instanciation de $searchProduct
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
     * Méthode pour recupérer un produit par son id
     * @return type
     */
    public function getProductByID() {
                $query = 'SELECT `labelProduct`, `textProduct`, `priceProduct`, `barcodeProduct`, `imgProduct`, `nameCategory` FROM `gleola1_products` WHERE `id` = :id';
             // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
           $productByID=$this->db->prepare($query);
         $productByID->bindValue(':id', $this->id, PDO::PARAM_INT);
           // on utilise la méthode execute() via un return
       $productByID->execute();
            // on vérifie l'instanciation de $userProfile
            if (is_object($productByID)){
                /* On crée la variable $getUserProfilByID qui va nous permettre de retourner le resultat 
             * La fonction fetch permet d'afficher la ligne de la requète que je souhaite récupérer
             */
            $getProductByID = $productByID->fetch(PDO::FETCH_OBJ);
            }
        // on renvoie le résultat   
        return $getProductByID;
    }
    /**
     * Méthode permettant de rechercher des produits par 5
     * @return boolean
     */
    public function getProductByFive($limit, $offset) {
        //Déclaration du tableau vide
        $result = array();
        // Préparation de la requête pour obtenir la liste de produit par 5 dans la BDD.
        $queryRresult = $this->db->prepare('SELECT `id`, `labelProduct`, `textProduct`, `priceProduct`, `barcodeProduct`, `imgProduct`, `nameCategory` '
                . 'FROM `gleola1_products` '
                . 'LIMIT :limit OFFSET :offset');
        $queryRresult->bindvalue(':limit', $limit, PDO::PARAM_INT);
        $queryRresult->bindvalue(':offset', $offset, PDO::PARAM_INT);
        if ($queryRresult->execute()) {
            // on vérifie l'instanciation de $queryRresult
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
