<?php
session_start();
// require '../config/db.php'; // Inclure la connexion à la base de données
require("../config/connexionBd.php");

// Vérifier si l'utilisateur est admin
// if (!isset($_SESSION['user']['is_admin']) || $_SESSION['user']['is_admin'] !== true) {
//     header('Location: ../index.php');
//     exit();
// }

// Récupérer toutes les commandes
$stmt = $access->query("SELECT o.*, u.username FROM orders o JOIN utilisateurs u ON o.user_id = u.id ORDER BY o.created_at DESC");
$orders = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des commandes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <?php
    include("../layouts/header.php")
    ?>
    <div class="container mt-5 text-white">
        <h1 class="mb-4">Gestion des commandes</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['id']) ?></td>
                        <td><?= htmlspecialchars($order['username']) ?></td>
                        <td><?= htmlspecialchars($order['total']) ?> €</td>
                        <td><?= htmlspecialchars($order['created_at']) ?></td>
                        <td>
                            <a href="order_details.php?order_id=<?= $order['id'] ?>" class="btn btn-primary btn-sm">Détails</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <?php
    include("../layouts/footer.php")
    ?>

</body>

</html>