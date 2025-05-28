<?php

/*

controleur

rôle : péparer la page d'accueil avec un choix entre poser une question et voir les questions/réponses

*/

// Initialisation
include "library/init.php";

// verification d'un id transmis par GET pour validation nouvelle question
if(isset($_GET["id"])){
    echo"nouvelle question enregistré avec succés";
} 

// Afficher la page d'accueil
include "templates/pages/page_accueil.php";
