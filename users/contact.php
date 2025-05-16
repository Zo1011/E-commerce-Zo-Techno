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
    <title>Accueil - Zo-Techno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
    <!-- Section Header -->
    <?php
    include("../layouts/header.php")
    ?>

    <header class="bg-dark py-3 text-white text-center">
        <h1>Contactez-nous</h1>
        <p>Vous avez une question ? N'hésitez pas à nous écrire.</p>
    </header>

    <!-- Section Contact -->
    <section class="container py-5 text-white">
        <div class="row g-4">
            <!-- Formulaire -->
            <div class="col-lg-6">
                <h2 class="mb-4">Envoyer un message</h2>
                <form id="contactForm" action="traitement-contact.php" method="post">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>

            <!-- Coordonnées -->
            <div class="col-lg-6">
                <h2 class="mb-4">Nos coordonnées</h2>
                <ul class="list-unstyled">
                    <li><strong>Adresse :</strong> Analamahitsy Cité Box 23</li>
                    <li><strong>Téléphone :</strong> +33 6 12 34 56 78</li>
                    <li><strong>Email :</strong> contact@Zo-Techno.com</li>
                </ul>
                <div class="mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7550.496874430133!2d47.545371900000006!3d-18.87605665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21f0872230450b2d%3A0xc342869b5ebf21fa!2sAnalamahitsy%2C%20Tananarive!5e0!3m2!1sfr!2smg!4v1746711223074!5m2!1sfr!2smg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêcher le rechargement de la page

            const form = event.target;
            const formData = new FormData(form);

            // Envoyer les données via AJAX
            fetch(form.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Afficher un pop-up de succès
                        alert(data.message);
                        form.reset(); // Réinitialiser le formulaire
                    } else {
                        // Afficher un pop-up d'erreur
                        alert(data.message);
                    }
                })
                .catch(error => {
                    // Afficher un message d'erreur en cas de problème
                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                    console.error('Erreur:', error);
                });
        });
    </script>
    <!-- Footer -->
    <?php
    include("../layouts/footer.php")
    ?>

</body>

</html>