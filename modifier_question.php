<?php

/*

controleur

rôle : modifier la nouvelle question dans la bdd faq
paramétres:
        POST : valeurs de la question a modifier

*/

// Initialisation
include "library/init.php";

// Récupère les paramètre à partir de l'id de la question)
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $question = $_POST["question"];
};

// création de l'objet
$update_question = new question();
$update_question->loadFromId($id);

// modification des champs
$update_question->setQuestion($question);


// modification dans la BDD
$update_question->update();

// on récupére les details de la question
$new_question = new question();
$new_question->loadFromId($id);

// vérification si la modification a fonctionnée
if (!$new_question->isLoaded()) {
    echo "Erreur lors de la modification";
    exit;
} else {
    echo"question modifiée avec succés";
}

// on affiche le résultat
include "templates/pages/modification_question.php";
