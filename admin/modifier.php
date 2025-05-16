<?php

require("../config/commandes.php");
session_start();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$produit = afficherParId($id);

if (!$produit) {
    echo "Produit introuvable.";
    exit;
}

if (isset($_POST['modifier'])) {
    $image = htmlspecialchars($_POST['image']);
    $nom = htmlspecialchars($_POST['nom']);
    $prix = htmlspecialchars($_POST['prix']);
    $description = htmlspecialchars($_POST['description']);

    modifier($id, $image, $nom, $prix, $description);
    header("Location: index.php"); // retour à la liste
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mofidier - ZO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body class="">
    <?php
    include("../layouts/header.php")
    ?>

    <div class="container py-5 text-white">
        <button class="btn btn-secondary" onclick="history.back()">⬅ Retour</button>
        <h1 class="mb-4">Modifier le produit</h1>
        <form method="post" class="card p-4">
            <div class="mb-3 w-50 mx-auto">
                <img src="<?= $produit->img ?>" class="card-img-top w-100 " style="object-fit-cover;" alt="Produit 1">
            </div>

            <div class="mb-3">
                <label>Image (URL)</label>
                <input type="url" name="image" class="form-control" value="<?= $produit->img ?>" required>
            </div>
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" value="<?= $produit->nom ?>" required>
            </div>
            <div class="mb-3">
                <label>Prix (€)</label>
                <input type="number" name="prix" class="form-control" value="<?= $produit->prix ?>" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" required><?= $produit->description ?></textarea>
            </div>
            <button type="submit" name="modifier" class="btn btn-success">Enregistrer</button>
            <a href="index.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 ZO-Techno. Tous droits réservés.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"> </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>