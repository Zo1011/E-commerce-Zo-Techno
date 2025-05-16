<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require("../config/commandes.php");


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catégories - ZO-Techno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">



</head>

<body>
    <?php
    include("../layouts/header.php")
    ?>
    <div class="container mt-5 text-white">
        <h2 class="text-center bg-dark p-4 mb-4">Produits dans la catégorie: <?= htmlspecialchars($category->nom) ?></h2>
        <div class="row">
            <?php if ($produits): ?>
                <?php foreach ($produits as $produit): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="image-container">
                                <a href="produit.php?id=<?= $produit->id ?>" class="image-container d-block">
                                    <img src="<?= htmlspecialchars($produit->img) ?>" class="card-img-top zoom-img" alt="<?= htmlspecialchars($produit->nom) ?>" style="height: 200px; object-fit: cover;">
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($produit->nom) ?></h5>
                                <p class="text-primary"><?= number_format($produit->prix, 2, ',', ' ') ?> €</p>
                                <a href="produit.php?id=<?= $produit->id ?>" class="btn btn-primary">Voir les détails</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Aucun produit dans cette catégorie.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php
    include("../layouts/footer.php")
    ?>
</body>

</html>