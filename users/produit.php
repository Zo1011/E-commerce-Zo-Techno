<?php
// produit.php

// Connexion à la base ou récupération de $mesProduits[]
// Supposons que tu aies une fonction getProduitById($id)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require '../config/connexionBd.php';
require '../config/commandes.php';

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    die("Produit invalide.");
}

$produit = getProduitById($id); // fonction à créer
if (!$produit) {
    die("Produit introuvable.");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($produit->nom) ?> </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>
<?php
include("../layouts/header.php")
?>

<div class="container py-5 text-white">
    <h1 class="mb-4"><?= htmlspecialchars($produit->nom) ?></h1>
    <div class="row">
        <div class="col-md-6">
            <img src="<?= htmlspecialchars($produit->img) ?>" alt="Image du produit" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h3>Prix : <?= htmlspecialchars($produit->prix) ?> €</h3>
            <p><?= nl2br($produit->description) ?></p>
            <!-- Bouton Ajouter au panier -->
            <form action="../config/add_to_cart.php" method="POST" class="mt-3" onsubmit="showCartModal(event)">
                <input type="hidden" name="product_id" value="<?= $produit->id ?>">
                <input type="hidden" name="product_name" value="<?= htmlspecialchars($produit->nom) ?>">
                <input type="hidden" name="product_price" value="<?= htmlspecialchars($produit->prix) ?>">
                <button type="submit" class="btn btn-success">Ajouter au panier</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- Section des liens utiles -->
            <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                <h5 class="fw-bold">Liens utiles</h5>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="../index.php" class="text-white text-decoration-none">Accueil</a></li>
                    <li class="list-inline-item"><a href="../users/categories.php" class="text-white text-decoration-none">Produits</a></li>
                    <li class="list-inline-item"><a href="../users/contact.php" class="text-white text-decoration-none">Contact</a></li>
                    <li class="list-inline-item"><a href="../users/about.php" class="text-white text-decoration-none">À propos</a></li>
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
                    <li class="list-inline-item"><a href="../users/conditions.php" class="text-white text-decoration-none">Conditions générales</a></li>
                    <li class="list-inline-item"><a href="../users/confidentialite.php" class="text-white text-decoration-none">Politique de confidentialité</a></li>
                    <li class="list-inline-item"><a href="../users/faq.php" class="text-white text-decoration-none">FAQ</a></li>
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

<script src="../JS/script.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"> </script>
<script>
    AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

<!-- Modal de confirmation -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Produit ajouté au panier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Le produit a été ajouté à votre panier avec succès !
            </div>
            <div class="modal-footer">
                <a href="../users/view_cart.php" class="btn btn-primary">Voir le panier</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continuer vos achats</button>
            </div>
        </div>
    </div>
</div>
</body>



</html>