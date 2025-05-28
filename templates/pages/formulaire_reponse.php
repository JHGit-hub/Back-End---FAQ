<?php

/* 

Template de page compléte : met en forme le formulaire pour répondre à une question
avec 2 boutons ; enregistrer et retour vers page accueil

Paramétres : 
        $idQuestion : id de la question à repondre 

*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de réponse</title>
</head>
<body>
   <main>
    <a href="accueil.php">
        <button>Retour vers page d'Accueil</button>
    </a>
   <?php
        // Obtenir la date et l'heure actuelles
        $dateActuelle = date('Y-m-d'); // Format YYYY-MM-DD
        $heureActuelle = date('H:i'); // Format HH:MM
    ?>
    <form method="post" action="enregistrer_reponse.php">
        <label for="idQuestion" style="display: none;">
            <input type="text" name="idQuestion" value="<?php echo $idQuestion; ?>">
        </label>
        <label>Pseudo :
            <input type="text" name="pseudo" value="" required>
        </label><br><br>
        <label>Date :
            <input type="date" name="date" value="<?php echo $dateActuelle; ?>" readonly>
        </label><br><br>
        <label>Heure :
            <input type="time" name="heure" value="<?php echo $heureActuelle; ?>" readonly>
        </label><br><br>
        <label for="reponse">Votre réponse :
            <textarea id="reponse" name="reponse" rows="5" cols="40"></textarea><br><br>
        </label>
        <input type="submit" value="Enregistrer"/>
    </form>
   </main> 
</body>
</html>