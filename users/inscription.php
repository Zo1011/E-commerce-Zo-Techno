<?php
require("../config/connexionBd.php");

require("../config/commandes.php");



$emailError = $usernameError = $passwordError = $successMessage = "";

if (isset($_POST['inscription'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm) {
        $passwordError = "⚠️ Les mots de passe ne correspondent pas.";
    } else {
        // Vérifier si l'email ou le nom d'utilisateur existe déjà
        $check = $access->prepare("SELECT * FROM utilisateurs WHERE email = ? OR username = ?");
        $check->execute([$email, $username]);
        $existingUser = $check->fetch();

        if ($existingUser) {
            if ($existingUser['email'] === $email) {
                $emailError = "⚠️ Cet email est déjà utilisé.";
            }
            if ($existingUser['username'] === $username) {
                $usernameError = "⚠️ Ce nom d'utilisateur est déjà utilisé.";
            }
        } else {
            // Hacher le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insérer l'utilisateur dans la base de données
            $req = $access->prepare("INSERT INTO utilisateurs (username, email, password) VALUES (?, ?, ?)");
            $req->execute([$username, $email, $hashed_password]);

            // Définir le message de succès
            $successMessage = "✅ Inscription réussie. <a href='loginUser.php'>Se connecter</a>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription- ZO-Techno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<?php
include("../layouts/header.php")
?>
<div class="container py-5 w-50 text-white  border-2 border-primary rounded">
    <div class="text-center m-2">
        <a class="navbar-brand fw-bold ms-0" href="../index.php"> <img width="200px" src="../img/80734ae7b77fc94a7a9d1aa80f3ad0ccb28c473b2efc32271b7c3412ee71f6a4-removebg-preview (2).png" alt="logo"></a>
    </div>
    <h2 class="text-center mb-4">Créer un compte</h2>

    <!-- Afficher le message de succès -->
    <?php if (!empty($successMessage)): ?>
        <div class="alert alert-success text-center">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= isset($username) ? htmlspecialchars($username) : '' ?>">
            <?php if (!empty($usernameError)): ?>
                <small class="text-danger"><?= $usernameError ?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
            <?php if (!empty($emailError)): ?>
                <small class="text-danger"><?= $emailError ?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
            <?php if (!empty($passwordError)): ?>
                <small class="text-danger"><?= $passwordError ?></small>
            <?php endif; ?>
        </div>

        <button type="submit" name="inscription" class="btn btn-primary">S'inscrire</button>
    </form>
    <div class="text-center mt-3">
        <p>Vous avez déjà un compte ? <a href="loginUser.php" class="text-primary"> Se Connecter </a></p>
    </div>
</div>
<?php
include("../layouts/footer.php")
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>

</html>