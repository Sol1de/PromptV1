<?php
session_start();

require 'template/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $send = $_POST['send'];
    $name = $_POST['name'];

    $insert = $database->prepare("INSERT INTO post (name, post) VALUES (:name, :post)");
    $insert->execute([
        "name" => $name,
        "post" => $send
    ]);

    // Redirection vers la page d'accueil après l'insertion du twoot
    header("Location: index.php");
    exit;
}
?>