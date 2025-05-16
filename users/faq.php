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
    <title>FAQ - ZO-Techno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body class="">
    <!-- Header -->
    <?php include("../layouts/header.php"); ?>

    <!-- Section principale -->
    <section class="container text-white py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Foire Aux Questions (FAQ)</h1>
            <p class="text-muted">Trouvez des réponses aux questions les plus fréquentes sur ZO-Techno.</p>
        </div>

        <div class="accordion" id="faqAccordion">
            <!-- Question 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer1" aria-expanded="true" aria-controls="answer1">
                        1. Quels types de produits propose ZO-Techno ?
                    </button>
                </h2>
                <div id="answer1" class="accordion-collapse collapse show" aria-labelledby="question1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        ZO-Techno propose une large gamme de produits technologiques, notamment des gadgets, des accessoires, des appareils électroniques, et bien plus encore.
                    </div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2" aria-expanded="false" aria-controls="answer2">
                        2. Comment puis-je passer une commande ?
                    </button>
                </h2>
                <div id="answer2" class="accordion-collapse collapse" aria-labelledby="question2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Pour passer une commande, ajoutez les produits souhaités à votre panier, puis cliquez sur "Commander". Suivez les instructions pour finaliser votre achat.
                    </div>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3" aria-expanded="false" aria-controls="answer3">
                        3. Quels sont les modes de paiement acceptés ?
                    </button>
                </h2>
                <div id="answer3" class="accordion-collapse collapse" aria-labelledby="question3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Nous acceptons les paiements par carte bancaire, PayPal, et virement bancaire.
                    </div>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer4" aria-expanded="false" aria-controls="answer4">
                        4. Proposez-vous une livraison internationale ?
                    </button>
                </h2>
                <div id="answer4" class="accordion-collapse collapse" aria-labelledby="question4" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Oui, nous proposons une livraison internationale. Les frais et délais de livraison varient en fonction de la destination.
                    </div>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer5" aria-expanded="false" aria-controls="answer5">
                        5. Puis-je retourner un produit ?
                    </button>
                </h2>
                <div id="answer5" class="accordion-collapse collapse" aria-labelledby="question5" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Oui, vous pouvez retourner un produit dans un délai de 14 jours après réception, à condition qu'il soit dans son état d'origine.
                    </div>
                </div>
            </div>

            <!-- Question 6 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer6" aria-expanded="false" aria-controls="answer6">
                        6. Comment puis-je suivre ma commande ?
                    </button>
                </h2>
                <div id="answer6" class="accordion-collapse collapse" aria-labelledby="question6" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Une fois votre commande expédiée, vous recevrez un email contenant un numéro de suivi et un lien pour suivre votre colis.
                    </div>
                </div>
            </div>

            <!-- Question 7 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question7">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer7" aria-expanded="false" aria-controls="answer7">
                        7. Proposez-vous des garanties sur vos produits ?
                    </button>
                </h2>
                <div id="answer7" class="accordion-collapse collapse" aria-labelledby="question7" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Oui, tous nos produits sont couverts par une garantie de 12 mois, sauf indication contraire.
                    </div>
                </div>
            </div>

            <!-- Question 8 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question8">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer8" aria-expanded="false" aria-controls="answer8">
                        8. Comment puis-je contacter le service client ?
                    </button>
                </h2>
                <div id="answer8" class="accordion-collapse collapse" aria-labelledby="question8" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Vous pouvez nous contacter via notre formulaire de contact ou par email à support@zo-techno.com.
                    </div>
                </div>
            </div>

            <!-- Question 9 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question9">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer9" aria-expanded="false" aria-controls="answer9">
                        9. Proposez-vous des remises pour les commandes en gros ?
                    </button>
                </h2>
                <div id="answer9" class="accordion-collapse collapse" aria-labelledby="question9" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Oui, nous proposons des remises pour les commandes en gros. Contactez-nous pour plus d'informations.
                    </div>
                </div>
            </div>

            <!-- Question 10 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="question10">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer10" aria-expanded="false" aria-controls="answer10">
                        10. Puis-je modifier ou annuler ma commande ?
                    </button>
                </h2>
                <div id="answer10" class="accordion-collapse collapse" aria-labelledby="question10" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Vous pouvez modifier ou annuler votre commande avant son expédition. Contactez notre service client pour toute assistance.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("../layouts/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>