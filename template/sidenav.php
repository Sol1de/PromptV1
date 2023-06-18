<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/sidenav.css">
    <title>Navbar</title>
</head>
<body>
    
<header>
    <span class="openbtn" onclick="toggleNav()">&#9776; Menu</span>
    <img src="img/prompt.svg" alt="prompt logo" width="200" height="70">
    <?php if (isset($_SESSION['user_id'])) { ?>
        <a href="profile.php"><button class="conBtn">Mon profil</button></a>
    <?php } else { ?>
        <div>
            <a href="connexion.php"><button class="conBtn">Se Connecter</button></a>
        </div>
    <?php } ?>
</header>

<div class="sidenav" id="mySidenav">
    <a href="index.php">Accueil</a>
    <a href="building.php">Recherche</a>
    <a href="profile.php">Compte</a>
    <a href="about.php">Infos</a>
</div>


    <script src="script.js"></script>
</body>
</html>