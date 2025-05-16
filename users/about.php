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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - ZO-Techno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <!-- Header -->
    <?php include("../layouts/header.php"); ?>

    <!-- Section principale -->
    <section class="container py-5 text-white">
        <div class="text-center mb-5 p-4 rounded">
            <h1 class="fw-bold">À propos de ZO-Techno</h1>
            <p class="text-muted">Découvrez notre mission, nos valeurs et notre engagement envers nos clients.</p>
        </div>

        <div class="row g-2 d-flex justify-content-center">
            <!-- Mission -->
            <div class="col-md-5 bg-light text-dark p-4 rounded m-3">
                <h2 class="fw-bold">Notre mission</h2>
                <p>
                    Chez <strong>ZO-Techno</strong>, notre mission est de fournir des produits technologiques de haute qualité à des prix compétitifs.
                    Nous croyons que la technologie doit être accessible à tous, et nous nous engageons à offrir une expérience d'achat exceptionnelle à nos clients.
                </p>
            </div>

            <!-- Valeurs -->
            <div class="col-md-5 bg-light text-dark p-4 rounded m-3">
                <h2 class="fw-bold">Nos valeurs</h2>
                <ul>
                    <li><strong>Innovation :</strong> Nous proposons les dernières tendances et innovations technologiques.</li>
                    <li><strong>Qualité :</strong> Chaque produit est soigneusement sélectionné pour répondre aux normes les plus élevées.</li>
                    <li><strong>Service client :</strong> Votre satisfaction est notre priorité absolue.</li>
                </ul>
            </div>
        </div>

        <div class="row g-2 d-flex justify-content-center">
            <!-- Expertise -->
            <div class="col-md-5 bg-light text-dark p-4 rounded m-3">
                <h2 class="fw-bold">Notre expertise</h2>
                <p>
                    Avec plusieurs années d'expérience dans le domaine de la technologie, <strong>ZO-Techno</strong> est votre partenaire de confiance pour tous vos besoins technologiques.
                    Que vous recherchiez des gadgets innovants, des accessoires de qualité ou des solutions technologiques, nous avons ce qu'il vous faut.
                </p>
            </div>

            <!-- Engagement -->
            <div class="col-md-5 bg-light text-dark p-4 rounded m-3">
                <h2 class="fw-bold">Notre engagement</h2>
                <p>
                    Nous nous engageons à offrir :
                </p>
                <ul>
                    <li>Des produits fiables et durables.</li>
                    <li>Une livraison rapide et sécurisée.</li>
                    <li>Un support client réactif et professionnel.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Section équipe -->
    <section class=" text-white py-5">
        <div class="container text-center">
            <h2 class="fw-bold">Rencontrez notre équipe</h2>
            <p class="mb-4">Derrière ZO-Techno se cache une équipe passionnée et dévouée.</p>
            <div class="row d-flex justify-content-center g-4">
                <div class="col-md-3 m-3 bg-dark p-4 text-white">
                    <div class="image-container">
                        <img src="https://media.istockphoto.com/id/1386479313/fr/photo/heureuse-femme-daffaires-afro-am%C3%A9ricaine-mill%C3%A9naire-posant-isol%C3%A9e-sur-du-blanc.jpg?s=612x612&w=0&k=20&c=CS0xj40eNCorQyzN1ImeMKlvPDocPHSaMsXethQ-Q_g=" class="zoom-img rounded mb-3  " alt="Fondateur" width="200">
                    </div>
                    <h5 class="fw-bold">Zo R.</h5>
                    <p>Fondateur & PDG</p>
                </div>
                <div class="col-md-3 m-3 bg-dark p-4 text-white">
                    <div class="image-container">
                        <img src=" https://media.istockphoto.com/id/1171169099/fr/photo/homme-avec-les-bras-crois%C3%A9s-disolement-sur-le-fond-gris.jpg?s=612x612&w=0&k=20&c=csQeB3utGtrGeb3WmdSxRYXaJvUy_xqlhbOIZxclcGA=" class=" rounded mb-3 zoom-img" alt="Support Client">

                    </div>
                    <h5 class="fw-bold">Ando T.</h5>
                    <p>Responsable Marketing</p>
                </div>
                <div class="col-md-3 m-3 bg-dark p-4 text-white">
                    <div class="image-container ">
                        <img src="https://media.istockphoto.com/id/1389348844/fr/photo/plan-de-studio-dune-belle-jeune-femme-souriante-debout-sur-un-fond-gris.jpg?s=612x612&w=0&k=20&c=VGipX3a8xrbYuXTNm_61pFuzpGdAO9lwt2xnVUd7Khs=" class="rounded mb-3 zoom-img" alt="Responsable Marketing" width="200">

                    </div>
                    <h5 class="fw-bold">Miora L.</h5>
                    <p>Support Client</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("../layouts/footer.php"); ?>
</body>

</html>