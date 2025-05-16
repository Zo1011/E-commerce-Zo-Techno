
<?php
// session_start();            // Démarre la session (ou reprend la session existante)
// session_unset();            // Supprime toutes les variables de session
// session_destroy();          // Détruit la session côté serveur

// // Redirection vers la page de connexion ou d’accueil
// header('Location:../users/loginUser.php');
// exit;


session_start();
session_unset();
session_destroy();
setcookie(session_name(), '', time() - 3600); // Supprime le cookie de session (facultatif mais recommandé)
header('Location:../users/loginUser.php'); // redirection vers l'accueil
exit;
// 
?>
