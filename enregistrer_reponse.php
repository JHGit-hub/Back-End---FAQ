<?php

/*

controleur

rôle : enregistrer la réponse à la question
paramétres:
        POST : $id A/I, $pseudo, $date, $time et le $id de la question de la $bdd faq

*/

// Initialisation
include "library/init.php";

// verification que le formulaire est valide
if (empty($_POST["pseudo"]) || empty($_POST["date"])|| empty($_POST["heure"])|| empty($_POST["reponse"])|| empty($_POST["idQuestion"])){
    echo "Formulaire non valide"; //affichage d'un message d'erreur
    include "templates/pages/formulaire_reponse.php"; // renvoi vers la page formulaire_reponse.php
    exit; // arrete le script si form invalide
} else {
    $pseudo = $_POST["pseudo"];
    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $reponse = $_POST["reponse"];
    $idQuestion = $_POST["idQuestion"];
};

// On créé une nouvelle reponse
$new_reponse = new reponse();

// On rempli la nouvelle réponse avec les valeurs recupérées
$new_reponse->setPseudo($pseudo);
$new_reponse->setDate($date);
$new_reponse->setHeure($heure);
$new_reponse->setReponse($reponse);
$new_reponse->setIdQuestion($idQuestion);


// On l'intégre dans la bdd
$new_reponse->insert();

// On renvoi vers la page de modificiation pour verifier la réponse avant validation
include "templates/pages/modification_reponse.php";