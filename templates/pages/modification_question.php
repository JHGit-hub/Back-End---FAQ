<?php

/* 

Template de page compléte : affiche le détail de la question posée
    avec 2 boutons; valider et modifier
Paramétres : 
        $new_question : tableau indéxé de la nouvelle question enregistrée sur la bdd faq

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
    <h1>Verifiez votre question avant validation</h1>
    <form method="post" action="modifier_question.php">
        <label for="id" style="display: none;">
            <input type="number" name="id" value="<?= $new_question->Id()?>">
        </label>
        <label for="date" style="display: none;">
            <input type="date" name="date" value="<?= $new_question->getDate()?>">
        </label>
        <label for="heure" style="display: none;">
            <input type="time" name="heure" value="<?= $new_question->getHeure()?>">
        </label>
        <label for="question">Question :
            <textarea id="question" name="question" rows="5" cols="40"><?= $new_question->getQuestion()?></textarea><br><br>
        </label>
        <input type="submit" value="Enregistrer la modification"/>
    </form>
        <a href="accueil.php?id=<?=$new_question->id()?>">
            <button>Valider</button>
        </a>
    <?php
    ?>
</main>
</body>
</html>