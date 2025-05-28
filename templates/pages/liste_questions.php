<?php

/* 

Template de page compléte : met en forme la liste des questions
        Utilisation d'un fragment de pages pour afficher les questions sous forme de tableau indéxé

Paramétres : 
        $liste_questions : tableau indéxé des questions enregistrées sur la bdd faq

*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des questions</title>
    <style>
    table{
        border-collapse: collapse;
    }
    td, th{
        border: 1px solid grey;
        padding: 3px;
    }
    </style>
</head>
<body>
    <main>
        <h1>Liste des questions</h1>
        <table>
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Date</th>
                    <th>Question</th>
                    <th>Répondre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // affichage de details des questions sous la
                    // forme d'un tableau indéxé
                    foreach($liste_questions as $question_id){
                        include "templates/fragments/trliste_questions.php";
                    }
                ?>
            </tbody>
        </table>
        <a href="accueil.php">
            <button>Retour vers page d'Accueil</button>
        </a>
    </main>   
</body>
</html>