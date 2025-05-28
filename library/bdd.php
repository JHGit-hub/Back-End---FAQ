<?php

/*
Librairie de fonctions d'accès à la Base de données

Les fonctions s'appuient sur $bdd, variable globale contenant un objet PDO initialisé sur la bonne base

*/

function bddRequest($sql, $param = []){
    // rôle : péparer et exécuter une requête et de retourner false ou un objet "PDOstatement"
    // paramétres:
    //          $sql : text de la commande SQL complète
    //          $param: tableau de valorisation des paramètres (Si on appel la fonction avec un seul paramétre, $param prendra la valeur [])
    // retour : soit false, soit la requête préparée et exécutée

    // on prépare la requête
    global $bdd;
    $req = $bdd->prepare($sql);

    // on vérifie les erreurs sur $req
    if(empty($req)){
        return false;
    }

    // on éxécute la requête
    $cr = $req->execute($param);

    // si $cr retourne true, on renvoi $req, false sinon
    if($cr){
        return $req;
    } else {
        return false;
    }
}

function bddGetRecord($sql, $param = []){
    // rôle : retourne un enregistrement de la bdd (premiére ligne récupérée par un SELECT) 
    //          sous forme d'un tableau
    // paramètres:
    //          $sql : texte de la commande SQL complète
    //          $param: tableau de valorisation des paramètres  (Si on appel la fonction avec un seul paramétre, $param prendra la valeur [])
    // retour : soit false, soit la premiére ligne récupérée

    // on prépare et exécute la requête
    $req = bddRequest($sql, $param);

    // si $req vaut false, retournez false
    if($req === false){
        return false;
    }

    // On récupére la premiére ligne avec fetch
    $ligne = $req->fetch(PDO::FETCH_ASSOC);

    // Return false si $ligne vide, $ligne sinon
    if(empty($ligne)){
        return false;
    } else {
        return $ligne;
    }
}

function bddGetRecords($sql, $param = []){
    // rôle : retourne toutes les lignes récupérées par un SELECT
    // Paramètres :
    //      $sql : texte de la commande SQL complète
    //      $param : tableau de valorisation des paramètres   (Si on appel la fonction avec un seul paramétre, $param prendra la valeur [])
    // Retour : un tableau comprenant des tableaux indexés par les noms des colonnes (ou un tableau vide)

    // on prépare et exécute la requête
    $req = bddRequest($sql, $param);

    // si $req vaut false, retournez false
    if($req === false){
        return false;
    }

    // On récupére toutes les lignes avec fetchAll
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function bddInsert($table, $valeurs){
    // rôle : insert un enregistrement dans la bdd et retourne la clé prmiaire A/I
    // paramétres:
    //          $table : nom de la table dasn la bdd
    //          $valeurs : tableau contenant les valeurs des champs [ "nomChamp1" => valeurAdonner, ... ]
    // retour : 0 en cas d'echec, la clé primaire créée sinon

    // On construie la requête
    $sql = "INSERT INTO `$table` ";

    // On prépare le tableau de paramétres
    $param = [];

    // On prépare un tableau pour y intégrer les éléments "`nomChamp` = :nomChamp"
    $tab = [];

    foreach($valeurs as $nomChamp => $valeurChamp){
        $tab[] = "`$nomChamp` = :$nomChamp";
        $param[":$nomChamp"] = $valeurChamp;
    }

    // On concaténe les élèments de $tab dans $sql
    $sql .= " SET " . implode(", ", $tab);

    // On compléte et éxècute la requête
    $req = bddRequest($sql, $param);

    // On récupére 0 si false
    if($req ===false){
        return 0;
    }

    // sinon on retourne la valeur de la clé primaire créée
    global $bdd;
    return $bdd->lastInsertId();

}

function bddUpdate($table, $valeurs, $id) {
    // Rôle : Mettre à jour un enregistrement dans la base de données
    // Paramètres :
    //      $table : nom de la table dans la BDD
    //      $valeurs : tableau des nouvelles valeurs des champs
    //      $id : valeur de la clé primaire
    // Retour : true si ok, false sinon

    // Construire la requête SQL et le tableau de paramètres 
    $sql = "UPDATE `$table` ";

    // Préparer le tabeau de paramètres 
    $param = [];
    // on doit ajouter pour chque champ de valeurs le texte "`nomChamp` = :nomChamp", en les séparant par une vigule
    // Et ajouter dans le tablea des paramètres : :nomChamp => valeur
    // Pour la partie texte :
    /// On prépare un tableau des textes "`nomChamp` = :nomChamp", puis on concataène les éléments séparés par une virgule
    // Préparer le tableau des extraits de la SQL
    $tab = [];
    foreach($valeurs as $nomChamp => $valeurChamp) {
        $tab[] = "`$nomChamp` = :$nomChamp";
        $param[":$nomChamp"] = $valeurChamp;
    }
    // Concatener les éléments de $tab (dans $sql)
    $sql .= " SET " . implode(", ", $tab);

    // Ajouter la clause WHERE et le parametre :id
    $sql .= " WHERE `id` = :id";
    $param[":id"] = $id;

    // préparer / exécuter la requête : utiliser la fonction bddRequest
    $req = bddRequest($sql, $param);

    // si on récupère false : on retourne false
    if ($req == false) {
        return false;
    } else { // Sinon retourner true
        return true;
    }

}
