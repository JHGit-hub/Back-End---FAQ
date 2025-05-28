<?php

/* 

Template de page compléte : met en forme la page d'accueil 
avec 2 boutons; voir liste des questions et poser une question

Paramétres : 
        néant

*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <main>
        <h1>Bienvenue sur notre FAQ!</h1>
        <h2>Que voulez-vous faire?</h2>
        <a href="formuler_question.php">
            <button>Posez une question</button>
        </a>
        <a href="lister_questions.php">
            <button>Répondre à une question</button>
        </a>
    </main>        
</body>
</html>