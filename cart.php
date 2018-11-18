<?php
include_once 'header.php';
include_once 'controllers/cartCtrl.php';
?>
<form method="post" action="panier.php">
    <table style="width: 400px">
        <tr>
            <td colspan="4">Votre panier</td>
        </tr>
        <tr>
            <td>Libellé</td>
            <td>Quantité</td>
            <td>Prix Unitaire</td>
            <td>Action</td>
        </tr>
        <?php
        if (createCart()) {
            $nbArticles = count($_SESSION['cart']['labelProduct']);
            if ($nbArticles <= 0) {
                ?>
                <tr>
                    <td>Votre panier est vide </td>
                </tr>
                <?php
            } else {
                for ($i = 0; $i < $nbArticles; $i++) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($_SESSION['cart']['labelProduct'][$i]); ?></td>
                        <td><input type="text" size="4" name="quantity" value= "<?= htmlspecialchars($_SESSION['cart']['qtyProduct'][$i]); ?>"/></td>
                        <td><?= htmlspecialchars($_SESSION['cart']['priceProduct'][$i]); ?></td>
                        <td><a href= "<?= htmlspecialchars('cart.php?action=suppression&l='.rawurlencode($_SESSION['cart']['labelProduct'][$i])); ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php
                }
                ?>
                <tr><td colspan="2"></td>
                    <td colspan="2">Total : <?= totalCart(); ?></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="submit" value="Rafraichir"/>
                        <input type="hidden" name="action" value="refresh"/>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</form>
<?php
include_once 'footer.php';
?>