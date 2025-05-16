<?php
session_start();
require 'connexionBd.php'; // Inclure la connexion à la base de données

if (!isset($_SESSION['user']['id'])) {
    header('Location: ../users/loginUser.php'); // Rediriger si l'utilisateur n'est pas connecté
    exit();
}

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    header('Location: ../users/view_cart.php'); // Rediriger si le panier est vide
    exit();
}

$user_id = $_SESSION['user']['id'];
$total = 0;

// Calculer le total de la commande
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

try {
    // Insérer la commande dans la table `orders`
    $stmt = $access->prepare("INSERT INTO orders (user_id, total) VALUES (?, ?)");
    $stmt->execute([$user_id, $total]);
    $order_id = $access->lastInsertId(); // Récupérer l'ID de la commande insérée

    // Insérer les produits dans la table `order_items`
    $stmt = $access->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    foreach ($_SESSION['cart'] as $item) {
        $stmt->execute([$order_id, $item['id'], $item['quantity'], $item['price']]);
    }

    // Vider le panier après la commande
    unset($_SESSION['cart']);

    // Rediriger vers une page de confirmation
    header('Location: ../users/order_confirmation.php?order_id=' . $order_id);
    exit();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
