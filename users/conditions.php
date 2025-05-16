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
    <title>Conditions Générales de Vente - ZO-Techno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body class="">
    <!-- Header -->
    <?php include("../layouts/header.php"); ?>

    <!-- Section principale -->
    <section class="container text-white py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Conditions Générales de Vente</h1>
            <p class="text-muted">Veuillez lire attentivement nos conditions générales de vente avant de passer commande.</p>
        </div>

        <div class="row">
            <div class="col-12 bg-light p-3 text-dark">
                <h2 class="fw-bold mt-4">1. Introduction</h2>
                <p>
                    Les présentes conditions générales de vente (CGV) régissent l'ensemble des transactions réalisées sur le site <strong>ZO-Techno</strong>. En passant commande, vous acceptez sans réserve ces conditions.
                </p>

                <h2 class="fw-bold mt-4">2. Produits</h2>
                <p>
                    Tous les produits proposés sur notre site sont décrits avec la plus grande précision possible. Les images sont fournies à titre indicatif et peuvent légèrement différer du produit réel.
                </p>

                <h2 class="fw-bold mt-4">3. Prix</h2>
                <p>
                    Les prix affichés sur notre site sont en euros (€) et incluent toutes les taxes (TTC). Les frais de livraison sont calculés séparément et affichés avant la validation de la commande.
                </p>

                <h2 class="fw-bold mt-4">4. Commandes</h2>
                <p>
                    Pour passer commande, vous devez créer un compte ou vous connecter à votre compte existant. Une fois votre commande validée, vous recevrez un email de confirmation contenant les détails de votre achat.
                </p>

                <h2 class="fw-bold mt-4">5. Paiement</h2>
                <p>
                    Nous acceptons les paiements par carte bancaire, PayPal, et virement bancaire. Toutes les transactions sont sécurisées grâce à un protocole de cryptage SSL.
                </p>

                <h2 class="fw-bold mt-4">6. Livraison</h2>
                <p>
                    Les commandes sont expédiées dans un délai de 2 à 5 jours ouvrables après confirmation du paiement. Les délais de livraison peuvent varier en fonction de la destination.
                </p>

                <h2 class="fw-bold mt-4">7. Retours et remboursements</h2>
                <p>
                    Vous disposez d'un délai de 14 jours après réception de votre commande pour demander un retour ou un remboursement. Les produits doivent être retournés dans leur état d'origine.
                </p>

                <h2 class="fw-bold mt-4">8. Garantie</h2>
                <p>
                    Tous nos produits sont couverts par une garantie de 12 mois, sauf indication contraire. En cas de problème, veuillez contacter notre service client.
                </p>

                <h2 class="fw-bold mt-4">9. Responsabilité</h2>
                <p>
                    ZO-Techno ne peut être tenu responsable des dommages indirects résultant de l'utilisation de ses produits ou services.
                </p>

                <h2 class="fw-bold mt-4">10. Service client</h2>
                <p>
                    Pour toute question ou réclamation, vous pouvez contacter notre service client par email à <a href="mailto:support@zo-techno.com">support@zo-techno.com</a>.
                </p>

                <h2 class="fw-bold mt-4">11. Modifications des CGV</h2>
                <p>
                    ZO-Techno se réserve le droit de modifier les présentes conditions générales de vente à tout moment. Les CGV applicables sont celles en vigueur au moment de la commande.
                </p>

                <h2 class="fw-bold mt-4">12. Droit applicable</h2>
                <p>
                    Les présentes conditions générales de vente sont régies par le droit français. En cas de litige, les tribunaux français seront seuls compétents.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("../layouts/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>