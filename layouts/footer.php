    <!-- Footer -->
    <footer class="bg-dark text-white mt-4 py-4 ">
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
    <?php
    include("../users/modal.php")
    ?>
    <script src="../JS/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"> </script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>

    </html>