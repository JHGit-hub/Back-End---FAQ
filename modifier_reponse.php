<?php

/*

controleur

rôle : modifier la nouvelle réponse dans la bdd reponses
paramétres:
        POST : valeurs de la réponse a modifier

*/

// Initialisation
include "library/init.php";

// Récupère les paramètre à partir de l'id de la réponse)
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $reponse = $_POST["reponse"];
    $idQuestion = $_POST["question_id"];
};

// création de l'objet
$update_reponse = new reponse();
$update_reponse->loadFromId($id);

// modification des champs
$update_reponse->setReponse($reponse);


// modification dans la BDD
$update_reponse->update();

// on récupére les details de la réponse
$new_reponse = new reponse();
$new_reponse->loadFromId($id);

// vérification si la modification a fonctionnée
if (!$new_reponse->isLoaded()) {
    echo "Erreur lors de la modification";
    exit;
} else {
    echo"réponse modifiée avec succés";
}

// on affiche le résultat
include "templates/pages/modification_reponse.php";