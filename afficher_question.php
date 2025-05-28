<?php

/*

controleur

rôle : extraire le detail de la question et les réponses
paramétres:
        GET id : $idQuestion (cle primaire de la question selectionnée)

*/

// Initialisation
include "library/init.php";

// Récupère les paramètre : id (de la note)
if (isset($_GET["id"])) {
    $idQuestion = $_GET["id"];
} else {
    $idQuestion = 0;
};

// creation du detail de la question
$details = new question;

// on rempli la liste
$detail_question = $details->loadFromId($idQuestion);


// creation de la liste des reponses de la question selectionnée
$liste = new reponse;

// on rempli la liste 
$liste_reponses = $liste->listForQuestion($idQuestion);


// on renvoi vers le template detail_question.php
include "templates/pages/detail_question.php";