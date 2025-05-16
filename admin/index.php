<?php
session_start();
require("../config/commandes.php");
require("../config/connexionBd.php");
$mesProduits = afficher();
// Vérification de la session et des identifiants spécifiques
if (
    !isset($_SESSION['user']) ||
    $_SESSION['user']['username'] !== 'Zo' ||
    $_SESSION['user']['email'] !== 'rajaonarisoafenotianazo@gmail.com'
) {
    // Redirection vers la page de connexion ou une page d'erreur
    header("Location: ../users/loginUser.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de bord Admin - ZO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-light">
    <?php
    include("../layouts/header.php")
    ?>
    <div class="container py-5 text-white">

        <h1 class="text-center mb-4">Tableau de Bord</h1>

        <!-- Barre de navigation -->
        <nav id="nav-dashboard" class="nav nav-dashboard nav-pills nav-justified mb-4">
            <a class="nav-link active" href="#users" onclick="showSection('users', event)">Gestion des utilisateurs</a>
            <a class="nav-link" href="#orders" onclick="showSection('orders', event)">Liste des commandes</a>
            <a class="nav-link" href="#products" onclick="showSection('products', event)">Gestion des produits</a>
            <a class="nav-link" href="#productsforhomePage" onclick="showSection('productsforhomePage', event)">Gestion des produits pour la page d'accueil</a>

        </nav>


        <!-- Section Gestion des utilisateurs -->
        <div id="users" class="dashboard-section">
            <div class="container mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom d'utilisateur</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // Liste des emails des administrateurs
                        $adminEmails = ['rajaonarisoafenotianazo@gmail.com'];

                        // Préparer la requête pour exclure les administrateurs
                        $placeholders = implode(',', array_fill(0, count($adminEmails), '?'));
                        $stmt = $access->prepare("SELECT id, username, email, created_at FROM utilisateurs WHERE email NOT IN ($placeholders)");
                        $stmt->execute($adminEmails);
                        $clients = $stmt->fetchAll();

                        foreach ($clients as $client): ?>
                            <tr>
                                <td><?= htmlspecialchars($client['id']) ?></td>
                                <td><?= htmlspecialchars($client['username']) ?></td>
                                <td><?= htmlspecialchars($client['email']) ?></td>
                                <td><?= htmlspecialchars($client['created_at']) ?></td>
                                <td>
                                    <form action="../config/delete_client.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
                                        <input type="hidden" name="client_id" value="<?= $client['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section Gestion des commandes -->
        <?php
        // Récupérer toutes les commandes
        $stmt = $access->query("SELECT o.*, u.username FROM orders o JOIN utilisateurs u ON o.user_id = u.id ORDER BY o.created_at DESC");
        $orders = $stmt->fetchAll();
        ?>
        <div id="orders" class="dashboard-section" style="display: none;">
            <div class="container mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= htmlspecialchars($order['id']) ?></td>
                                <td><?= htmlspecialchars($order['username']) ?></td>
                                <td><?= htmlspecialchars($order['total']) ?> €</td>
                                <td><?= htmlspecialchars($order['created_at']) ?></td>
                                <td>
                                    <a href="order_details.php?order_id=<?= $order['id'] ?>" class="btn btn-primary btn-sm">Détails</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section Gestion des produits -->
        <div id="products" class="dashboard-section" style="display: none;">
            <!-- Contenu de la gestion des produits -->
            <!-- Liste des produits -->
            <div id="productList" class="row gy-4">
                <section class="py-5 " data-aos="fade-left">
                    <div class="container">
                        <h2 class="mb-4 text-center">Liste des produits </h2>
                        <div class="row g-2 ">
                            <?php foreach ($mesProduits as $produit):     ?>
                                <div class="col-md-4">
                                    <div class="card product-card">
                                        <img src="<?= $produit->img ?>" class="card-img-top" style="height:300px;object-fit-cover;" alt="Produit 1">
                                        <div class="card-body text-center">
                                            <h5 class="card-title"> <?= $produit->nom ?> </h5>
                                            <p class="card-text"><?= $produit->prix ?>€</p>
                                            <div class="product-description flex-grow-1 overflow-auto">
                                                <?php
                                                $description = ($produit->description);
                                                $words = explode(' ', $description);
                                                echo count($words) > 15 ? implode(' ', array_slice($words, 0, 15)) . '...' : $description;
                                                ?>
                                            </div>
                                            <a href="modifier.php?id=<?= $produit->id ?>" class="btn btn-warning btn-sm mt-2">Modifier</a>
                                            <form method="post" onsubmit="return confirm('Supprimer ce produit ?');">
                                                <input type="hidden" name="delete_id" value="<?= $produit->id ?>">
                                                <button type="submit" name="supprimer" class="btn btn-danger btn-sm mt-2">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            <?php endforeach ?>

                        </div>
                    </div>
                </section>


            </div>
            <h1 class="text-center mb-4">Ajouter un Produit</h1>

            <!-- Formulaire d'ajout -->
            <form id="productForm" class="card p-4 shadow-sm mb-4 w-75 mx-auto" method="post" data-aos="fade-left">
                <div class="mb-3">
                    <label for="productImage" class="form-label">Image (URL)</label>
                    <input type="url" class="form-control" name="productImage" id="productImage" required>
                </div>
                <div class="mb-3">
                    <label for="productName" class="form-label">Nom du produit</label>
                    <input type="text" class="form-control" name="productName" id="productName" required>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Prix (€)</label>
                    <input type="number" class="form-control" name="productPrice" id="productPrice" required>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="productDescription" id="productDescription" rows="2" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="categorie_id" class="form-label">Catégorie</label>
                    <select name="categorie_id" id="categorie_id" class="form-select" required>
                        <option value="">-- Choisir une catégorie --</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat->id ?>"><?= htmlspecialchars($cat->nom) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <button type="submit" name="valider" class="btn btn-primary">Ajouter le produit</button>
            </form>
        </div>

        <!-- Section Gestion des produits pour la page d'accueil -->
        <div id="productsforhomePage" class="dashboard-section" style="display: none;">
            <!-- Contenu de la gestion des produits -->
            <div class="container mt-5  p-4">
                <!-- Formulaire pour ajouter plusieurs produits à une section -->
                <div class="bg">
                    <form action="../config/manage_homepage.php" method="POST">
                        <div class="mb-3">
                            <label for="section_name" class="form-label">
                                <h3>Nom de la section</h3>
                            </label>
                            <input type="text" name="section_name" id="section_name" class="form-control" placeholder="Exemple : Meilleures ventes" required>
                        </div>

                        <div class="mb-3">
                            <label for="product_ids" class="form-label">
                                <h3>Produits</h3>
                            </label>
                            <select name="product_ids[]" id="product_ids" class="form-select" multiple required>
                                <?php
                                // Récupérer tous les produits
                                $stmt = $access->query("SELECT id, nom FROM produits");
                                $products = $stmt->fetchAll();
                                foreach ($products as $product): ?>
                                    <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['nom']) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-muted">Maintenez la touche Ctrl (ou Cmd sur Mac) pour sélectionner plusieurs produits.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter à la section</button>
                    </form>


                </div>

                <!-- Liste des sections et produits associés -->
                <h3 class="mt-5">Produits affichés sur la page d'accueil</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Section</th>
                            <th>Produit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Récupérer les sections et les produits associés
                        $stmt = $access->query("SELECT hs.id AS section_id, hs.section_name, p.nom AS product_name, p.id AS product_id 
                        FROM homepage_sections hs 
                        JOIN produits p ON hs.product_id = p.id 
                        ORDER BY hs.section_name");
                        $sections = $stmt->fetchAll();

                        $currentSection = '';
                        foreach ($sections as $section):
                            // Si la section change, afficher son nom
                            if ($currentSection !== $section['section_name']):
                                $currentSection = $section['section_name'];
                        ?>
                                <tr>
                                    <td rowspan="<?= count(array_filter($sections, fn($s) => $s['section_name'] === $currentSection)) ?>">
                                        <?= htmlspecialchars($currentSection) ?>
                                    </td>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($section['product_name']) ?></td>
                                <td>
                                    <form action="../config/delete_homepage_product.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit de la section ?');">
                                        <input type="hidden" name="section_id" value="<?= $section['section_id'] ?>">
                                        <input type="hidden" name="product_id" value="<?= $section['product_id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <!-- Footer -->
    <?php
    include("../layouts/footer.php")
    ?>
    <script>
        function showSection(sectionId, event) {
            // Empêcher le comportement par défaut du lien (scroll)
            if (event) {
                event.preventDefault();
            }

            // Masquer toutes les sections
            const sections = document.querySelectorAll('.dashboard-section');
            sections.forEach(section => {
                section.style.display = 'none';
            });

            // Afficher la section sélectionnée
            const selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }

            // Mettre à jour l'état actif des liens de navigation
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector(`a[href="#${sectionId}"]`).classList.add('active');
        }
    </script>
</body>

</html>