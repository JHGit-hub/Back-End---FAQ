<?php

/*

controleur

rôle : enregistrer une nouvelle question dans la bdd
paramétres:
        POST : $id A/I, $pseudo, $date, $time, $question

*/

// Initialisation
include "library/init.php";

// verification que le formulaire est valide
if (empty($_POST["pseudo"]) || empty($_POST["date"])|| empty($_POST["heure"])|| empty($_POST["question"])){
    echo "Formulaire non valide"; //affichage d'un message d'erreur
    include "templates/pages/formulaire_question.php"; // renvoi vers la page formulaire_question.php
    exit; // arrete le script si form invalide
} else {
    $pseudo = $_POST["pseudo"];
    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $question = $_POST["question"];
};

// On créé une nouvelle question
$new_question = new question();

// On rempli la nouvelle question avec les valeurs recupérer
$new_question->setPseudo($pseudo);
$new_question->setDate($date);
$new_question->setHeure($heure);
$new_question->setQuestion($question);

// On l'intégre dans la bdd
$new_question->insert();

// On renvoi vers la page de modificiation pour verifier la question avant validation
include "templates/pages/modification_question.php";