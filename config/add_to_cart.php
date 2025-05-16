<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'])) {
    $product_id = (string) $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $found = false;

    // Utiliser une référence pour modifier directement l'élément
    foreach ($_SESSION['cart'] as &$item) {
        if ((string) $item['id'] === $product_id) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }
    unset($item); // 🔥 TRÈS IMPORTANT : libérer la référence

    if (!$found) {
        $_SESSION['cart'][] = [
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1
        ];
    }

    // Calcul de la quantité totale
    $totalQuantity = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalQuantity += $item['quantity'];
    }

    echo json_encode(['totalQuantity' => $totalQuantity]);
    exit();
}
