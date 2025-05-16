<?php
session_start();
require("../config/connexionBd.php");
require("../config/commandes.php");
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Vérifier les informations de connexion
    $stmt = $access->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie
        session_start();
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email']
        ];
        header('Location: ../index.php');
        exit();
    } else {
        // Stocker le message d'erreur
        $errorMessage = "❌ Email ou mot de passe incorrect.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<?php
include("../layouts/header.php")
?>
<div class="container py-5 w-50 text-white  ">
    <div class="text-center m-2">
        <a class="navbar-brand fw-bold ms-0" href="../index.php"> <img width="200px" src="../img/80734ae7b77fc94a7a9d1aa80f3ad0ccb28c473b2efc32271b7c3412ee71f6a4-removebg-preview (2).png" alt="logo"></a>
    </div>
    <h1 class="text-center mb-4">Connexion</h1>

    <!-- Afficher le message d'erreur -->
    <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-danger text-center">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>
    <div class="text-center mt-3">
        <p>Vous n'avez pas encore de compte ? <a href="inscription.php" class="text-primary">Inscrivez-vous ici</a></p>
    </div>


</div>


<?php
include("../layouts/footer.php")
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>

</html>