<?php
require '../config/connexionBd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section_name = htmlspecialchars($_POST['section_name']);
    $product_ids = $_POST['product_ids']; // Tableau contenant les IDs des produits sélectionnés

    try {
        // Insérer chaque produit dans la section
        $stmt = $access->prepare("INSERT INTO homepage_sections (section_name, product_id) VALUES (?, ?)");
        foreach ($product_ids as $product_id) {
            $stmt->execute([$section_name, intval($product_id)]);
        }

        // Rediriger avec un message de succès
        header('Location: ../admin/index.php?success=Produits ajoutés à la section');
        exit();
    } catch (PDOException $e) {
        // Rediriger avec un message d'erreur
        header('Location: ../admin/index.php?error=Erreur lors de l\'ajout des produits');
        exit();
    }
}
