<?php
session_start();
require '../config/connexionBd.php'; // Inclure la connexion à la base de données

// Vérifier si l'utilisateur est admin
// if (!isset($_SESSION['user']['is_admin']) || $_SESSION['user']['is_admin'] !== true) {
//     header('Location: ../index.php');
//     exit();
// }

if (!isset($_GET['order_id'])) {
    header('Location:orders.php');
    exit();
}

$order_id = $_GET['order_id'];

// Récupérer les informations de la commande
$stmt = $access->prepare("SELECT o.*, u.username FROM orders o JOIN utilisateurs u ON o.user_id = u.id WHERE o.id = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch();

if (!$order) {
    echo "Commande introuvable.";
    exit();
}

// Récupérer les produits de la commande
$stmt = $access->prepare("SELECT oi.*, p.nom FROM order_items oi JOIN produits p ON oi.product_id = p.id WHERE oi.order_id = ?");
$stmt->execute([$order_id]);
$order_items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la commande</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <?php
    include("../layouts/header.php")
    ?>
    <div class="container mt-5 text-white">
        <h1 class="mb-4">Détails de la commande #<?= htmlspecialchars($order['id']) ?></h1>
        <p>Client : <?= htmlspecialchars($order['username']) ?></p>
        <p>Total : <?= htmlspecialchars($order['total']) ?> €</p>
        <p>Date : <?= htmlspecialchars($order['created_at']) ?></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Grouper les produits par ID
                $groupedItems = [];
                foreach ($order_items as $item) {
                    if (isset($groupedItems[$item['product_id']])) {
                        $groupedItems[$item['product_id']]['quantity'] += $item['quantity'];
                    } else {
                        $groupedItems[$item['product_id']] = $item;
                    }
                }

                // Afficher les produits regroupés
                foreach ($groupedItems as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['nom']) ?></td>
                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                        <td><?= htmlspecialchars($item['price']) ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="orders.php" class="btn btn-secondary">Retour</a>
    </div>
    <!-- Footer -->
    <?php
    include("../layouts/footer.php")
    ?>

</body>

</html>