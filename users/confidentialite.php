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
    <title>Politique de Confidentialité - ZO-Techno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body class="bg-light">
    <!-- Header -->
    <?php include("../layouts/header.php"); ?>

    <!-- Section principale -->
    <section class="container py-5 text-white">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Politique de Confidentialité</h1>
            <p class="text-muted">Découvrez comment nous collectons, utilisons et protégeons vos données personnelles.</p>
        </div>

        <div class="row">
            <div class="col-12 bg-light p-3 text-dark">
                <h2 class="fw-bold mt-4">1. Introduction</h2>
                <p>
                    Chez <strong>ZO-Techno</strong>, nous accordons une grande importance à la confidentialité de vos données personnelles. Cette politique explique comment nous collectons, utilisons et protégeons vos informations.
                </p>

                <h2 class="fw-bold mt-4">2. Données collectées</h2>
                <p>
                    Nous collectons les données suivantes lorsque vous utilisez notre site :
                </p>
                <ul>
                    <li>Informations personnelles : nom, adresse email, numéro de téléphone, adresse de livraison.</li>
                    <li>Informations de paiement : données nécessaires pour traiter vos paiements (via des plateformes sécurisées).</li>
                    <li>Données de navigation : adresse IP, type de navigateur, pages visitées, etc.</li>
                </ul>

                <h2 class="fw-bold mt-4">3. Utilisation des données</h2>
                <p>
                    Les données collectées sont utilisées pour :
                </p>
                <ul>
                    <li>Traiter vos commandes et assurer leur livraison.</li>
                    <li>Vous envoyer des emails de confirmation et des notifications.</li>
                    <li>Améliorer votre expérience utilisateur sur notre site.</li>
                    <li>Vous proposer des offres personnalisées et des promotions.</li>
                </ul>

                <h2 class="fw-bold mt-4">4. Partage des données</h2>
                <p>
                    Nous ne partageons pas vos données personnelles avec des tiers, sauf dans les cas suivants :
                </p>
                <ul>
                    <li>Pour traiter vos paiements via des plateformes sécurisées.</li>
                    <li>Pour assurer la livraison de vos commandes via nos partenaires logistiques.</li>
                    <li>Pour respecter une obligation légale ou une demande des autorités compétentes.</li>
                </ul>

                <h2 class="fw-bold mt-4">5. Sécurité des données</h2>
                <p>
                    Nous mettons en œuvre des mesures de sécurité techniques et organisationnelles pour protéger vos données contre tout accès non autorisé, perte ou divulgation.
                </p>

                <h2 class="fw-bold mt-4">6. Vos droits</h2>
                <p>
                    Conformément au Règlement Général sur la Protection des Données (RGPD), vous disposez des droits suivants :
                </p>
                <ul>
                    <li>Accéder à vos données personnelles.</li>
                    <li>Demander la rectification ou la suppression de vos données.</li>
                    <li>Vous opposer au traitement de vos données.</li>
                    <li>Demander la portabilité de vos données.</li>
                </ul>
                <p>
                    Pour exercer vos droits, veuillez nous contacter à <a href="mailto:support@zo-techno.com">support@zo-techno.com</a>.
                </p>

                <h2 class="fw-bold mt-4">7. Cookies</h2>
                <p>
                    Nous utilisons des cookies pour améliorer votre expérience sur notre site. Vous pouvez configurer votre navigateur pour refuser les cookies ou être averti lorsqu'un cookie est envoyé.
                </p>

                <h2 class="fw-bold mt-4">8. Modifications de la politique</h2>
                <p>
                    Nous nous réservons le droit de modifier cette politique de confidentialité à tout moment. Les modifications seront publiées sur cette page avec une date de mise à jour.
                </p>

                <h2 class="fw-bold mt-4">9. Contact</h2>
                <p>
                    Si vous avez des questions ou des préoccupations concernant notre politique de confidentialité, veuillez nous contacter à <a href="mailto:support@zo-techno.com">support@zo-techno.com</a>.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("../layouts/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>