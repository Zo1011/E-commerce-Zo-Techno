<?php
session_start();
require '../config/connexionBd.php'; // Inclure la connexion à la base de données

// Vérifier si un ID de client est fourni
if (isset($_POST['client_id'])) {
    $client_id = $_POST['client_id'];

    try {
        // Supprimer le client de la base de données
        $stmt = $access->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $stmt->execute([$client_id]);

        // Rediriger vers le tableau de bord avec un message de succès
        $_SESSION['success_message'] = "Le client a été supprimé avec succès.";
        header('Location: ../admin/index.php');
        exit();
    } catch (PDOException $e) {
        // Rediriger avec un message d'erreur en cas de problème
        $_SESSION['error_message'] = "Une erreur s'est produite lors de la suppression du client.";
        header('Location: ../admin/index.php');
        exit();
    }
} else {
    // Rediriger si aucun ID de client n'est fourni
    header('Location: ../admin/index.php');
    exit();
}
