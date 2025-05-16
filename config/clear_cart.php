<?php
session_start();

// Vérifier si le panier existe dans la session
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']); // Supprime le panier
}

// Rediriger vers la page du panier après avoir vidé le panier
header('Location: ../users/view_cart.php');
exit();
