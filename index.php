<?php

session_start();

require "template/database.php";

//préparation
$requete = $database->prepare("SELECT * FROM post ORDER BY date DESC");

//éxecution
$requete->execute();

//tablaeau associatif
$allTwoots = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Prompt</title>
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
</head>
<body>
  <?php require "template/sidenav.php" ?>

  <div class="content">
  <?php if (isset($_SESSION['user_name'])) { ?>
    
    <form class="twooting" method="POST" action="insert_post.php">
        <textarea type="text" name="send" placeholder="Un mot à dire ?, <?= $_SESSION['user_name'] ?> ?" ></textarea>
        <button type="submit" name="Poster">Poster</button>
        <input type="hidden" name="name" value="<?= $_SESSION['user_name'] ?>">
    </form>
    
    <?php } else { ?>
    
        <div class="twooting">
        <p>Vous devez vous <span><a href="connexion.php" id="connec">connecter</a></span> pour pouvoir poster.</p>
    
    </div>
    <?php } ?>

    <div class="twoots">
        <?php foreach ($allTwoots as $twoot) { ?>
        <div class="twoot">
            <p class="twootName"><?= $twoot['name']; ?></p>
            <p class="twootContent"><?= $twoot['content'] ?></p>
            <p class="twootDate">Twooté le : <?= $twoot['date'] ?></p>

                 <!-- bouton "supprimer" -->
        <?php
            if (isset($_SESSION['user_name'])){
        ?>
            <?php
                //a qui appartient le twoot ??
                if ($_SESSION['user_name'] === $twoot['name']){
                //afficher "supprimer" en conséquence ⤵
            ?>
            <form action="delete.php" method="POST">
            <input type="hidden" name="del" value="<?= $twoot['id'] ?>">
                <button class="btnDel" type="submit">Supprimer</button>
            </form>
            <?php } } ?>
            

        </div>
        <?php } ?>
    </div>

  </div>

  <script src="script.js"></script>
</body>
</html>