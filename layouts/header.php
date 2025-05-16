<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Navbar -->
<nav id="Navbar" class="navbar navbar-expand-lg   shadow-sm sticky-top p-2">
    <div class="d-flex justify-content-around w-100">
        <div class="d-flex align-items-center mx-3">
            <a class="navbar-brand fw-bold ms-0" href="../index.php"> <img width="140px" src="../img/80734ae7b77fc94a7a9d1aa80f3ad0ccb28c473b2efc32271b7c3412ee71f6a4-removebg-preview (2).png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="nav">
            <form class="d-flex me-auto ms-0 align-items-center w-100" action="../recherche.php" method="GET">
                <input class="form-control me-2" type="search" name="q" placeholder="Rechercher un produit..." aria-label="Search" style="width: 300px;">
                <button class="btn btn-outline-primary" type="submit">Rechercher</button>
            </form>
            <ul class="navbar-nav text-white ms-auto d-flex align-items-center">
                <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="../index.php">Accueil</a></li>
                <!-- Nav item avec mega menu -->
                <li class="nav-item dropdown d-none d-md-block position-static">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'produits.php' ? 'active' : '' ?> dropdown-toggle" href="../users/categories.php" id="megaMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catégories
                    </a>
                    <div class="dropdown-menu w-100 mt-0 border-0 shadow mega-menu-desktop">
                        <div class="container py-4">
                            <div class="row justify-content-center text-center">
                                <?php foreach ($categories as $cat): ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= htmlspecialchars($cat->nom) ?></h5>
                                            <div class="image-container">
                                                <a href="../users/produits.php?categorie=<?= $cat->id ?>" class="image-container d-block">
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

                <!-- Version mobile visible uniquement en mobile -->
                <li class="nav-item dropdown d-block d-md-none">
                    <a class="nav-link dropdown-toggle" href="#" id="mobileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catégories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="mobileDropdown">
                        <?php foreach ($categories as $cat): ?>
                            <li>
                                <a href="users/produits.php?categorie=<?= $cat->id ?>" class="image-container d-block">
                                    <h5 class="card-title"><?= htmlspecialchars($cat->nom) ?></h5>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>" href="../users/contact.php">Contact</a></li>


                <?php if (isset($_SESSION['user'])): ?>

                    <li class="nav-item">
                        <a class="nav-link text-danger" href="../config/logout.php">Déconnexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-username" href="#">
                            <?= htmlspecialchars($_SESSION['user']['username']); ?>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link  <?= basename($_SERVER['PHP_SELF']) == 'loginUser.php' ? 'active' : '' ?>" href="../users/loginUser.php">Connexion</a>
                    </li>
                <?php endif; ?>
                <?php if (
                    isset($_SESSION['user']['username'], $_SESSION['user']['email']) &&
                    $_SESSION['user']['username'] === 'Zo' &&
                    $_SESSION['user']['email'] === 'rajaonarisoafenotianazo@gmail.com'
                ): ?>
                    <li class="nav-item">
                        <a class="nav-link " href="../admin/index.php">Tableau de bord</a>
                    </li>
                <?php endif; ?>

                <!-- <li class="nav-item"><a class="nav-link " href="../users/loginUser.php">Connexion</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link " href="../config/logout.php">Deconnexion</a></li> -->
                <!-- Panier -->
                <li class="nav-item">
                    <a class="btn btn-outline-dark position-relative" href="../users/view_cart.php">
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
    </div>
</nav>