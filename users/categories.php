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

    <section class="py-5 ">
        <div class="container">
            <h2 class="text-center mb-4">Nos Catégories</h2>
            <div class="row justify-content-center g-3">
                <?php foreach ($categories as $cat): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="card h-100 text-center shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($cat->nom) ?></h5>
                                <div class="image-container">
                                    <a href="users/produits.php?categorie=<?= $cat->id ?>" class="image-container d-block">
                                        <img src="<?= htmlspecialchars($cat->image) ?>" class="card-img-top img-animated " alt="<?= htmlspecialchars($cat->nom) ?>">
                                    </a>
                                </div>
                                <a href="produits.php?categorie=<?= $cat->id ?>" class="btn btn-outline-primary">Voir les produits</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
    include("../layouts/footer.php")
    ?>
</body>

</html>