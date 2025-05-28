<?php

/*

controleur

rôle : extraire la liste des questions de la bdd FAQ
paramétres:
        $bdd faq incluant id A/I

*/

// Initialisation
include "library/init.php";

// creation de la liste
$liste = new question;

// on rempli la liste 
$liste_questions = $liste->listAll();

/*
echo "<pre>";
print_r($liste_questions);
echo "</pre>";
*/
// on renvoi vers le template liste_questions.php
include "templates/pages/liste_questions.php";