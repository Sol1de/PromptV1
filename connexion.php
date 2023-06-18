<?php
session_start();
require 'template/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $query = $database->prepare("SELECT * FROM user WHERE mail = :mail AND password = :password");
    $query->execute([
        "mail" => $mail,
        "password" => $password
    ]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // L'utilisateur est connecté avec succès
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_mail'] = $user['mail'];
        header("Location: index.php");
        exit;
    } else {
        // Identifiants invalides, afficher un message d'erreur
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>

<?php require "template/sidenav.php" ?>

<h1 class="titleCO">Connexion</h1>

<form class="formCO" method="POST" action="connexion.php">
    <input class="formElement" type="text" name="mail" placeholder="Mail">
    <input class="formElement" type="password" name="password" placeholder="Mot de passe">
    <button class="send" type="submit">Se connecter</button>
</form>

<a href="inscription.php" class="formCO"><button class="send noacc">Je n'ai pas de compte</button></a>

<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>

<script src="script.js"></script>
</body>
</html>