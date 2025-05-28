<?php

/* 

Template de page compléte : affiche le détail de la réponse apportée à la question
    avec 2 boutons; valider et modifier
Paramétres : 
        $new_reponse : tableau indéxé de la nouvelle réponse enregistrée sur la bdd faq

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
    <form method="post" action="modifier_reponse.php">
        <label for="id" style="display: none;">
            <input type="number" name="id" value="<?= $new_reponse->Id()?>">
        </label>
        <label for="date" style="display: none;">
            <input type="date" name="date" value="<?= $new_reponse->getDate()?>">
        </label>
        <label for="heure" style="display: none;">
            <input type="time" name="heure" value="<?= $new_reponse->getHeure()?>">
        </label>
        <label for="question_id" style="display: none;">
            <input type="number" name="question_id" value="<?= $new_reponse->getIdQuestion()?>">
        </label>
        <label for="reponse">Réponse :
            <textarea id="reponse" name="reponse" rows="5" cols="40"><?= $new_reponse->getReponse()?></textarea><br><br>
        </label>
        <input type="submit" value="Enregistrer la modification"/>
    </form>
    <a href="accueil.php">
        <button>Valider</button>
    </a>
</main>
</body>
</html>