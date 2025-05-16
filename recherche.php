<?php
// recherche.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Connexion à la BDD
require("config/connexionBd.php");
require("config/commandes.php");

// Récupération du mot-clé
$motCle = $_GET['q'] ?? '';

// Requête de recherche
$produits = [];
if (!empty($motCle)) {
    $stmt = $access->prepare("SELECT * FROM produits WHERE nom LIKE :mot OR description LIKE :mot");
    $stmt->execute(['mot' => '%' . $motCle . '%']);
    $produits = $stmt->fetchAll(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rechercher dans ZO-Techno </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark  shadow-sm sticky-top py-3">
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
                        🛒
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
    <div class="container py-5 text-white">
        <h1>Résultats pour "<?= htmlspecialchars($motCle) ?>"</h1>

        <?php if ($produits): ?>
            <div class="row g-3">
                <?php foreach ($produits as $produit): ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="<?= htmlspecialchars($produit->img) ?>" class="card-img-top" style="height:250px;object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($produit->nom) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($produit->prix) ?> €</p>
                                <a href="users/produit.php?id=<?= $produit->id ?>" class="btn btn-primary">Voir</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Aucun produit trouvé.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <!-- Section des liens utiles -->
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <h5 class="fw-bold">Liens utiles</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="index.php" class="text-white text-decoration-none">Accueil</a></li>
                        <li class="list-inline-item"><a href="produits.php" class="text-white text-decoration-none">Produits</a></li>
                        <li class="list-inline-item"><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
                        <li class="list-inline-item"><a href="about.php" class="text-white text-decoration-none">À propos</a></li>
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
                        <li class="list-inline-item"><a href="terms.php" class="text-white text-decoration-none">Conditions générales</a></li>
                        <li class="list-inline-item"><a href="privacy.php" class="text-white text-decoration-none">Politique de confidentialité</a></li>
                        <li class="list-inline-item"><a href="faq.php" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <!-- Section des moyens de paiement -->
                <div class="col-md-6 text-center text-md-end">
                    <h5 class="fw-bold">Moyens de paiement</h5>
                    <img src="images/payment/visa.png" alt="Visa" class="me-2" style="width: 40px;">
                    <img src="images/payment/mastercard.png" alt="MasterCard" class="me-2" style="width: 40px;">
                    <img src="images/payment/paypal.png" alt="PayPal" style="width: 40px;">
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