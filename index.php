<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require("config/connexionBd.php");
require("config/commandes.php");
$mesProduits = afficher();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil - ZO-Techno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav id="Navbar" class="navbar navbar-expand-lg   shadow-sm sticky-top p-2">
        <div class="d-flex justify-content-around w-100">
            <div class="d-flex align-items-center mx-3">
                <a class="navbar-brand fw-bold ms-0" href="../index.php"> <img width="140px" src="img/80734ae7b77fc94a7a9d1aa80f3ad0ccb28c473b2efc32271b7c3412ee71f6a4-removebg-preview (2).png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="nav">
                <!-- Barre de recherche -->
                <form class="d-flex me-auto ms-0 align-items-center w-100" action="recherche.php" method="GET">
                    <input class="form-control me-2" type="search" name="q" placeholder="Rechercher un produit..." aria-label="Search" style="width: 300px;">
                    <button class="btn btn-outline-primary" type="submit">Rechercher</button>
                </form>
            </div>
            <!-- Liens de navigation -->
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">Accueil</a>
                </li>
                <!-- Mega menu pour les catégories -->
                <li class="nav-item dropdown d-none d-md-block position-static me-3">
                    <a class="nav-link dropdown-toggle" href="#" id="megaMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catégories
                    </a>
                    <div class="dropdown-menu w-100 mt-0 border-0 shadow mega-menu-desktop">
                        <div class="container py-4">
                            <div class="row justify-content-center text-center">
                                <?php foreach ($categories as $cat): ?>
                                    <div class="col-md-3 col-sm-6 mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= htmlspecialchars($cat->nom) ?></h5>
                                            <div class="image-container">
                                                <a href="users/produits.php?categorie=<?= $cat->id ?>" class="image-container d-block">
                                                    <img src="<?= htmlspecialchars($cat->image) ?>" class="card-img-top zoom-img" alt="<?= htmlspecialchars($cat->nom) ?>">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>" href="users/contact.php">Contact</a>
                </li>
                <!-- Connexion / Déconnexion -->
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item me-3">
                        <a class="nav-link text-danger" href="./config/logout.php">Déconnexion</a>
                    </li>

                <?php else: ?>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="users/loginUser.php">Connexion</a>
                    </li>
                <?php endif; ?>

                <?php if (
                    isset($_SESSION['user']['username'], $_SESSION['user']['email']) &&
                    $_SESSION['user']['username'] === 'Zo' &&
                    $_SESSION['user']['email'] === 'rajaonarisoafenotianazo@gmail.com'
                ): ?>
                    <li class="nav-item">
                        <a class="nav-link  " href="admin/index.php">Tableau de bord</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user']['username'])): ?>
                    <li class="nav-item me-3">
                        <a class="nav-link nav-username" href="#">
                            <?= htmlspecialchars($_SESSION['user']['username']); ?>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Panier -->
                <li class="nav-item">
                    <a class="btn btn-outline-dark position-relative" href="users/view_cart.php">
                        <span style="font-size: 25px;"> 🛒</span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php
                            $totalQuantity = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    $totalQuantity += $item['quantity']; // Additionne les quantités
                                }
                            }
                            echo $totalQuantity;
                            ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Hero -->

    <section class="hero-section text-white text-center d-flex align-items-center justify-content-center">
        <div>
            <h1 class="hero-title">Bienvenue sur Ma Boutique ZO-Techno</h1>
            <p class="lead">Des produits uniques, pour vous.</p>
            <a href="users/categories.php" class="btn-cta"> Voir nos produits</a>
        </div>
    </section>
    <!-- Carousel -->
    <div id="carouselPromo" class="carousel py-5 slide" data-aos="fade-up" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Promo 1">
                <div class="carousel-caption">
                    <h5>Promo exceptionnelle cette semaine !</h5>
                    <p>-30%</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1537498425277-c283d32ef9db?q=80&w=1478&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Promo 2">
                <div class="carousel-caption">
                    <h5>Nouveaux produits tech</h5>
                    <p>Découvrez les dernières tendances !</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPromo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselPromo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>




    <section class="py-5  text-white">
        <div class="container">
            <h2 class="mb-4 text-center">Produits récents</h2>
            <div class="row g-3">
                <?php foreach ($recentProducts as $prod): ?>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="users/produit.php?id=<?= $prod->id ?>" class="text-decoration-none">
                            <div class="card h-100" data-aos="fade-left">
                                <img src="<?= htmlspecialchars($prod->img) ?>" class="card-img-top zoom-img img-float" style="height:120px;object-fit:cover;" alt="<?= htmlspecialchars($prod->nom) ?>">
                                <div class="card-body text-center p-2">
                                    <h6 class="card-title mb-1"><?= htmlspecialchars($prod->nom) ?></h6>
                                    <small class="text-primary"><?= htmlspecialchars($prod->prix) ?>€</small>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Catégories -->

    <section class="py-5 text-white">
        <div class="container">
            <h2 class="text-center mb-4">Nos Catégories</h2>
            <div class="row justify-content-center g-3">
                <?php foreach ($categories as $cat): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="card h-100 text-center shadow-sm">
                            <div class="card-body" data-aos="fade-right">
                                <h5 class="card-title"><?= htmlspecialchars($cat->nom) ?></h5>
                                <div class="image-container py-2">
                                    <a href="users/produits.php?categorie=<?= $cat->id ?>" class="image-container d-block">
                                        <img src="<?= htmlspecialchars($cat->image) ?>" class="card-img-top img-animated zoom-img" alt="<?= htmlspecialchars($cat->nom) ?>">
                                    </a>
                                </div>
                                <a href="users/produits.php?categorie=<?= $cat->id ?>" class="btn btn-outline-primary">Voir les produits</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class=" text-center py-2">
                <a class="btn " href="users/categories.php"> <button class=" btn btn-outline-primary"> Voir les Catégories </button></a>

            </div>
        </div>
    </section>

    <!-- Produit par section séléctionnée -->
    <section class="">
        <div class="container ">
            <?php
            // Récupérer les sections et les produits associés
            $stmt = $access->query("SELECT hs.section_name, p.nom AS product_name, p.prix, p.img,p.description, p.id AS product_id 
                            FROM homepage_sections hs 
                            JOIN produits p ON hs.product_id = p.id 
                            ORDER BY hs.section_name");
            $sections = $stmt->fetchAll();

            $currentSection = '';
            foreach ($sections as $section):
                if ($currentSection !== $section['section_name']):
                    if ($currentSection !== '') echo '</div>'; // Fermer la section précédente
                    $currentSection = $section['section_name'];
            ?>
                    <section class="py-5 text-white" data-aos="fade-up">
                        <div class="container">
                            <h2 class="mb-4 text-center"><?= htmlspecialchars($currentSection) ?></h2>
                            <div class="row g-2">
                            <?php endif; ?>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card product-card h-100 d-flex flex-column" data-aos="fade-left">
                                    <div class="image-container">
                                        <!-- Lien autour de l'image -->
                                        <a href="./users/produit.php?id=<?= $section['product_id'] ?>" class="image-container d-block">
                                            <img src="<?= htmlspecialchars($section['img']) ?>" class="card-img-top zoom-img" alt="<?= htmlspecialchars($section['product_name']) ?>">
                                        </a>
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?= htmlspecialchars($section['product_name']) ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($section['prix']) ?> €</p>
                                        <div class="product-description flex-grow-1 overflow-auto">
                                            <?php
                                            $description = ($section['description']);
                                            $words = explode(' ', $description);
                                            echo count($words) > 15 ? implode(' ', array_slice($words, 0, 15)) . '...' : $description;
                                            ?>
                                        </div>
                                        <!-- Bouton Ajouter au panier -->
                                        <form action="./config/add_to_cart.php" method="POST" class="mt-3" onsubmit="showCartModal(event)">
                                            <input type="hidden" name="product_id" value="<?= $section['product_id'] ?>">
                                            <input type="hidden" name="product_name" value="<?= htmlspecialchars($section['product_name']) ?>">
                                            <input type="hidden" name="product_price" value="<?= htmlspecialchars($section['prix']) ?>">
                                            <button type="submit" class="btn btn-success">Ajouter au panier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                            </div> <!-- Fermer la dernière section -->
                        </div>
                    </section>
        </div>
        </div>


    </section>

    <!-- Produits en vedette -->
    <section class="p-5 text-white" data-aos="fade-up">
        <div class="container ">
            <h2 class="mb-4 text-center">Produits en vedette</h2>
            <div class="row g-2">
                <?php foreach ($mesProduits as $produit): ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card product-card h-100 d-flex flex-column" data-aos="fade-left">
                            <div class="image-container">
                                <a href="./users/produit.php?id=<?= $produit->id ?>" class="image-container d-block">
                                    <img src="<?= htmlspecialchars($produit->img) ?>" class="card-img-top zoom-img" alt="<?= htmlspecialchars($produit->nom) ?>">
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column text-center">
                                <h5 class="card-title"><?= htmlspecialchars($produit->nom) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($produit->prix) ?>€</p>
                                <div class="product-description flex-grow-1 overflow-auto">
                                    <?php
                                    $description = ($produit->description);
                                    $words = explode(' ', $description);
                                    echo count($words) > 15 ? implode(' ', array_slice($words, 0, 15)) . '...' : $description;
                                    ?>
                                </div>
                                <!-- Bouton Ajouter au panier -->
                                <form action="./config/add_to_cart.php" method="POST" class="mt-3" onsubmit="showCartModal(event)">
                                    <input type="hidden" name="product_id" value="<?= $produit->id ?>">
                                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($produit->nom) ?>">
                                    <input type="hidden" name="product_price" value="<?= htmlspecialchars($produit->prix) ?>">
                                    <button type="submit" class="btn btn-success">Ajouter au panier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>


    <!-- Avis des clients -->
    <section class="testimonials  py-5 m-3 ">
        <div class="container bg-white rounded-3 p-4 shadow text-dark">
            <h2 class="text-center mb-4">Ce que disent nos clients</h2>
            <div id="carouselTestimonials " class="carousel slide " data-bs-ride="carousel">
                <div class="carousel-inner  ">
                    <div class="d-flex align-items-center">
                        <div class="carousel-item active ">
                            <div class="row text-center ">
                                <div class="col-md-4">
                                    <blockquote class="blockquote">
                                        <img src="https://media.istockphoto.com/id/1389348844/fr/photo/plan-de-studio-dune-belle-jeune-femme-souriante-debout-sur-un-fond-gris.jpg?s=612x612&w=0&k=20&c=VGipX3a8xrbYuXTNm_61pFuzpGdAO9lwt2xnVUd7Khs=" alt="Jean Dupont" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <p>"Service rapide et produits de qualité. Je recommande vivement ZO-Techno !"</p>
                                        <footer class="blockquote-footer text-dark">Jean Bon</footer>
                                        <div class="text-warning">
                                            ★★★★☆
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-md-4">
                                    <blockquote class="blockquote">
                                        <img src="https://media.istockphoto.com/id/1386479313/fr/photo/heureuse-femme-daffaires-afro-am%C3%A9ricaine-mill%C3%A9naire-posant-isol%C3%A9e-sur-du-blanc.jpg?s=612x612&w=0&k=20&c=CS0xj40eNCorQyzN1ImeMKlvPDocPHSaMsXethQ-Q_g=" alt="Marie Curie" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <p>"Les prix sont imbattables et le service client est excellent."</p>
                                        <footer class="blockquote-footer text-dark">Marie Rose</footer>
                                        <div class="text-warning">
                                            ★★★★★
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-md-4">
                                    <blockquote class="blockquote">
                                        <img src="https://media.istockphoto.com/id/1171169099/fr/photo/homme-avec-les-bras-crois%C3%A9s-disolement-sur-le-fond-gris.jpg?s=612x612&w=0&k=20&c=csQeB3utGtrGeb3WmdSxRYXaJvUy_xqlhbOIZxclcGA=" alt="Albert Einstein" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <p>"J'ai trouvé tout ce dont j'avais besoin pour mon bureau à domicile."</p>
                                        <footer class="blockquote-footer text-dark">Albert Jean</footer>
                                        <div class="text-warning">
                                            ★★★★☆
                                        </div>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <blockquote class="blockquote">
                                        <img src="https://img.freepik.com/photos-gratuite/jeune-homme-barbu-chemise-rayee_273609-5677.jpg?semt=ais_hybrid&w=740" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <p>"Livraison rapide et produits conformes à la description."</p>
                                        <footer class="blockquote-footer text-white">Isaac Newton</footer>
                                        <div class="text-warning">
                                            ★★★★★
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-md-4">
                                    <blockquote class="blockquote">
                                        <img src="https://img.freepik.com/psd-gratuit/personne-celebrant-son-orientation-sexuelle_23-2150115662.jpg" alt="Nikola Tesla" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <p>"Une expérience d'achat agréable et sans soucis."</p>
                                        <footer class="blockquote-footer text-dark">Nikola Rave</footer>
                                        <div class="text-warning">
                                            ★★★★☆
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-md-4">
                                    <blockquote class="blockquote">
                                        <img src="https://media.istockphoto.com/id/536932782/fr/photo/magnifique-sourire-magnifique-brunette-portrait.jpg?s=612x612&w=0&k=20&c=eQ-n3an089RhuH-RYWMZHoUa2tWWXaJdhKBMLiQNoR8=" alt="Ada Lovelace" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <p>"Des produits innovants et un excellent rapport qualité-prix."</p>
                                        <footer class="blockquote-footer text-dark">Ada Loren</footer>
                                        <div class="text-warning">
                                            ★★★★★
                                        </div>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <!-- Section des liens utiles -->
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <h5 class="fw-bold">Liens utiles</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="index.php" class="text-white text-decoration-none">Accueil</a></li>
                        <li class="list-inline-item"><a href="users/categories.php" class="text-white text-decoration-none">Produits</a></li>
                        <li class="list-inline-item"><a href="users/contact.php" class="text-white text-decoration-none">Contact</a></li>
                        <li class="list-inline-item"><a href="users/about.php" class="text-white text-decoration-none">À propos</a></li>
                    </ul>
                </div>
                <!-- Section des réseaux sociaux -->
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <h5 class="fw-bold">Suivez-nous</h5>
                    <a href="https://facebook.com" target="_blank" class="text-white me-3">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="text-white me-3">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="text-white me-3">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="text-white">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                </div>
                <!-- Section des informations de contact -->
                <div class="col-md-4 text-center text-md-start">
                    <h5 class="fw-bold">Contactez-nous</h5>
                    <p class="mb-1"><i class="fas fa-phone-alt me-2"></i>+33 1 23 45 67 89</p>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i>support@zo-techno.com</p>
                    <p><i class="fas fa-map-marker-alt me-2"></i>Box 1 Immeuble Sirène, Analamahitsy, Madagascar</p>
                </div>
            </div>
            <hr class="bg-light">
            <div class="row">
                <!-- Section des informations légales -->
                <div class="col-md-6 text-center text-md-start">
                    <h5 class="fw-bold">Informations légales</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="users/conditions.php" class="text-white text-decoration-none">Conditions générales</a></li>
                        <li class="list-inline-item"><a href="users/confidentialite.php" class="text-white text-decoration-none">Politique de confidentialité</a></li>
                        <li class="list-inline-item"><a href="users/faq.php" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <!-- Section des moyens de paiement -->
                <div class="col-md-6 text-center text-md-end">
                    <h5 class="fw-bold">Moyens de paiement</h5>
                    <i class="fab fa-cc-visa me-2" style="font-size: 40px;"></i>
                    <i class="fab fa-cc-mastercard me-2" style="font-size: 40px;"></i>
                    <i class="fab fa-cc-paypal me-2" style="font-size: 40px;"></i>

                </div>
            </div>
            <!-- Section des droits d'auteur -->
            <div class="text-center mt-3">
                <p class="mb-0">&copy; <?= date('Y') ?> ZO-Techno. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    <?php
    include("users/modal.php");
    ?>
    <script src="./JS/script.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"> </script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>