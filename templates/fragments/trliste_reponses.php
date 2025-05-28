<?php

/*

Template de fragment : liste des réponses données à la question désigné par son id

paramétre:
        $liste_reponses : tableau indéxé des réponses à la question désigné par son id, en utilisant $reponses comme index
*/

?>
<p>
    <u>Pseudo</u>:&nbsp;&nbsp;&nbsp;&nbsp; <?= $reponses->getPseudo() ?>&nbsp;&nbsp;&nbsp;&nbsp;
    <u>Date</u>:&nbsp;&nbsp;&nbsp;&nbsp; <?= $reponses->getDate() ?>&nbsp;&nbsp;&nbsp;&nbsp;
    <u>Heure</u>:&nbsp;&nbsp;&nbsp;&nbsp; <?= $reponses->getHeure() ?><br>
</p>

<p><u>Réponse</u> : <?= $reponses->getReponse() ?><br><br><br>