<?php
session_start();

// Calculer la quantité totale
$totalQuantity = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $totalQuantity += $item['quantity']; // Additionne les quantités
    }
}

// Retourner la quantité totale au format JSON
echo json_encode(['totalQuantity' => $totalQuantity]);
exit();
