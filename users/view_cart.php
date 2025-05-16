<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require("../config/commandes.php");


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catégories - ZO-Techno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
    <?php
    include("../layouts/header.php")
    ?>
    <div class="container mt-5 text-white">
        <h1 class="mb-4">Votre Panier</h1>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $groupedCart = [];

                    // Grouper les produits par ID
                    foreach ($_SESSION['cart'] as $item) {
                        if (isset($groupedCart[$item['id']])) {
                            $groupedCart[$item['id']]['quantity'] += $item['quantity'];
                        } else {
                            $groupedCart[$item['id']] = $item;
                        }
                    }

                    // Afficher les produits regroupés
                    foreach ($groupedCart as $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= htmlspecialchars($item['price']) ?> €</td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td><?= $subtotal ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Total : <?= $total ?> €</h3>
            <a href="../config/place_order.php" class="btn btn-success">Passer la commande</a>

            <a href="../config/clear_cart.php" class="btn btn-danger">Vider le panier</a>
        <?php else: ?>
            <p>Votre panier est vide.</p>
            <a href="../index.php" class="btn btn-primary">Continuer vos achats</a>
        <?php endif; ?>

    </div>
    <!-- Footer -->
    <?php
    include("../layouts/footer.php")
    ?>

</body>

</html>