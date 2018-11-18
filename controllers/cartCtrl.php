<?php

// Fonction création d'un panier
function createCart() {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
        $_SESSION['cart']['labelProduct'] = array();
        $_SESSION['cart']['qtyProduct'] = array();
        $_SESSION['cart']['priceProduct'] = array();
        $_SESSION['cart']['lock'] = false;
    }
    return true;
}

// Fonction ajouter un article
function addArticle($labelProduct, $qtyProduct, $priceProduct) {

    //Si le panier existe
    if (createCart() && !isLock()) {
        //Si le produit existe déjà on ajoute seulement la quantité
        $positionProduct = array_search($labelProduct, $_SESSION['cart']['labelProduct']);

        if ($positionProduct !== false) {
            $_SESSION['cart']['qtyProduct'][$positionProduct] += $qtyProduct;
        } else {
            //Sinon on ajoute le produit
            array_push($_SESSION['cart']['labelProduct'], $labelProduct);
            array_push($_SESSION['cart']['qtyProduct'], $qtyProduct);
            array_push($_SESSION['cart']['priceProduct'], $priceProduct);
        }
    } else {
        echo 'USER_CART_ERROR';
    }
}

// Fonction suppression d'un article
    function deleteArticle($labelProduct) {
        //Si le panier existe
        if (createCart() && !isLock()) {
            //on passe par un panier temporaire
            $tmpCart = array();
            $tmpCart['labelProduct'] = array();
            $tmpCart['qtyProduct'] = array();
            $tmpCart['priceProduct'] = array();
            $tmpCart['lock'] = $_SESSION['cart']['lock'];

            for ($i = 0; $i < count($_SESSION['cart']['labelProduct']); $i++) {
                if ($_SESSION['cart']['labelProduct'][$i] !== $labelProduct) {
                    array_push($tmpCart['labelProduct'], $_SESSION['cart']['labelProduct'][$i]);
                    array_push($tmpCart['qtyProduct'], $_SESSION['cart']['qtyProduct'][$i]);
                    array_push($tmpCart['priceProduct'], $_SESSION['cart']['priceProduct'][$i]);
                }
            }
            //On remplace le panier en session par notre panier temporaire à jour
            $_SESSION['cart'] = $tmpCart;
            //On efface le panier temporaire
            unset($tmpCart);
        } else {
            echo 'USER_CART_ERROR';
        }
    }

// Fonction modification de la quantité d'un article
        function modifyQtyArticle($labelProduct, $qtyProduct) {
            //Si le panier éxiste
            if (createCart() && !isLock()) {
                //Si la quantité est positive on modifie sinon on supprime l'article
                if ($qtyProduct > 0) {
                    //Recharche du produit dans le panier
                    $positionProduct = array_search($labelProduct, $_SESSION['cart']['labelProduct']);

                    if ($positionProduct !== false) {
                        $_SESSION['cart']['qtyProduct'][$positionProduct] = $qtyProduct;
                    
                } else {
                    deleteArticle($labelProduct);
                }
            } else {
                    echo 'USER_CART_ERROR';
                }
            }
        }
// Fonction renvoie le montant global des achats
                function totalCart() {
                    $total = 0;
                    for ($i = 0; $i < count($_SESSION['cart']['labelProduct']); $i++) {
                        $total += $_SESSION['cart']['qtyProduct'][$i] * $_SESSION['cart']['priceProduct'][$i];
                    }
                    return $total;
                }

// Fonction vérification état du verrou
                function isLock() {
                    if (isset($_SESSION['cart']) && $_SESSION['cart']['lock'])
                        return true;
                    else
                        return false;
                }

// Fonction compter le nombre d'articles
                function countArticles() {
                    if (isset($_SESSION['cart']))
                        return count($_SESSION['cart']['labelProduct']);
                    else
                        return 0;
                }

// Fonction supprimer panier
                function deleteCart() {
                    unset($_SESSION['cart']);
                }
