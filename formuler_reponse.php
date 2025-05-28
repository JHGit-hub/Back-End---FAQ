<?php

/*

controleur

rôle : préparer le formulaire pour répondre à une question
paramétres:
        GET $id : $idQuestion; clé primaire de la question à laquelle on veut répondre

*/

// Initialisation
include "library/init.php";

// On récupére l'id de la question
if(isset($_GET["id"])){
    $idQuestion = $_GET["id"];
} else {
    $idQuestion = 0; 
}

echo"$idQuestion";
// on affiche le formulaire de réponse

include "templates/pages/formulaire_reponse.php";