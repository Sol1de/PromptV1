<?php

require 'template/database.php';

// va chercher l'id envoyé correspondant au post à supprimer
$supp = $database->prepare("DELETE FROM post WHERE id = :id");
$supp->execute(
    [
        "id" => $_POST['del']
    ]
    );

// redirection vers l'index
header("Location: index.php");


?>