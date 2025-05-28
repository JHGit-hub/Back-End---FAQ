<?php

/* 

Template de page compléte : met en forme le détail d'une question et ses réponses
avec 2 boutons ; répondre et retour vers liste des questions

Paramétres : 
        $liste_reponses : tableau indéxé des réponses à la question déigné par son id

*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de la question</title>
</head>
<body>
    <main>
        <section>
            <h1>Détail de la question</h1>
            <p><u>Pseudo</u> : <?= $detail_question["pseudo"] ?><br>
            <p><u>Date</u> : <?= $detail_question["date"] ?><br>
            <p><u>Heure</u> : <?= $detail_question["heure"] ?><br>
            <p><u>Question</u> : <?= $detail_question["question"] ?><br>
        </section>
        <section>
            <h2>Réponses</h2>
            <?php
                foreach($liste_reponses as $reponses){
                    include "templates/fragments/trliste_reponses.php";
                }
            ?>
        </section>
        <section>
            <a href="lister_questions.php">
                <button>Retour à la liste des questions</button>
            </a>
            <a href="formuler_reponse.php?id=<?= $idQuestion ?>">
                <button>Répondez à la question</button>
            </a>
        </section>
    </main>
</body>
</html>