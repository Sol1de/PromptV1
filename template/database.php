<?php

//On se connecte a la base de donnée
try {
    $database = new PDO(
        'mysql:host=localhost;dbname=prompt',
        'root',
        ''
    );   
} 

// Si la connexion à échoué on detruit le site 
catch(PDOException $error) {
    die("error)");
}

?>