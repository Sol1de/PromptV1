<?php

session_start();
// on detruit la session
session_destroy();

// redirection vers la page d'accueil
header("Location: index.php");
exit;

?>