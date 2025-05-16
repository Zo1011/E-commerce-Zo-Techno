<?php
session_start();
require '../config/connexionBd.php'; // Inclure la connexion à la base de données

if (!isset($_GET['order_id'])) {
    header('Location: ../index.php'); // Rediriger si aucun ID de commande n'est fourni
    exit();
}

$order_id = $_GET['order_id'];

// Récupérer les informations de la commande
$stmt = $access->prepare("SELECT * FROM orders WHERE id = ?");
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
    <title>Confirmation de commande</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">


</head>

<body>
    <?php
    include("../layouts/header.php")
    ?>

    <div class="container mt-5 text-white">
        <h1 class="mb-4">Commande confirmée</h1>
        <p>Merci pour votre commande ! Voici les détails :</p>
        <h3>Commande #<?= htmlspecialchars($order['id']) ?></h3>
        <p>Total : <?= htmlspecialchars($order['total']) ?> €</p>
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
        <a href="../index.php" class="btn btn-primary">Retour à l'accueil</a>
    </div>
    <?php
    include("../layouts/footer.php")
    ?>

</body>


</html>