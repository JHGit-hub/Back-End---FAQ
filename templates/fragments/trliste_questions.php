<?php

/*

Template de fragment TR : tableau des questions présentes dans la bdd
    sur 4 colonne (psuedo, date, question, répondre)
    chaque ligne est cliquable pour voir plus de detail

paramétre:
        $liste_questions : tableau indéxé des questions de la $bdd faq en utilisant $questions comme index
*/
?>

<tr>
    <td><?= $question_id->getPseudo() ?></td>
    <td><?= $question_id->getDate()?></td>
    <td><?= $question_id->getQuestion() ?></td>
    <td><a href="afficher_question.php?id=<?=$question_id->id()?>">Répondre</a></td>
</tr>
