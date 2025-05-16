<?php
require '../config/connexionBd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section_id = intval($_POST['section_id']);
    $product_id = intval($_POST['product_id']);

    try {
        // Supprimer le produit de la section
        $stmt = $access->prepare("DELETE FROM homepage_sections WHERE id = ? AND product_id = ?");
        $stmt->execute([$section_id, $product_id]);

        // Rediriger avec un message de succès
        header('Location: ../admin/index.php?success=Produit supprimé de la section');
        exit();
    } catch (PDOException $e) {
        // Rediriger avec un message d'erreur
        header('Location: ../admin/index.php?error=Erreur lors de la suppression du produit');
        exit();
    }
}
