<?php 

session_start();

require "template/database.php";

// ETAPE 1 - PREPARATION
$requete = $database->prepare("SELECT * FROM user");
// ETAPE 2 - EXECUTION
$requete->execute();
// ETAPE 3 - ON EN FAIT UN TRUC
$donnees = $requete->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>

<?php require "template/sidenav.php" ?>

<h1 class="titleCO">Inscription</h1>

    <!-- formulaire pour entrer ses infoxs perso -->
    <form class="formCO" method="POST" action="insert_user.php">

        <input class="formElement" type="text" name="name" placeholder="Pseudo">
        <input class="formElement" type="text" name="mail" placeholder="Mail">
        <input class="formElement" type="password" name="password" placeholder="Mot de passe">

        <button class="send" type="submit">Créer mon compte</button>

    </form>

    <a href="connexion.php" class="formCO"><button class="send alracc">J'ai déjà un compte</button></a>


<script src="script.js"></script>
</body>
</html>