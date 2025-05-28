<?php

// classe : reponse
// gestion des objets "reponse"

class reponse{

    // propriétés - attributs
    // attributs du modèle physique
    protected $pseudo;           // pseudo de l'utilisateur
    protected $date;             // date d'enregistrement de la reponse
    protected $heure;            // heure d'enregistrement de la reponse
    protected $reponse;          // texte de la reponse

    // attributs du modèle conceptuel
    protected $id;              // valeur de la cle primaire
    protected $idQuestion;      // id de la question à laquelle on réponds

    // Mèthodes

    function isloaded(){
        // Rôle : indiquer si l'objet est chargé ou pas 
        // Paramètres : néant
        // Retour : true si il est chargé, false sinon

        return $this->id() !== 0;
    }

    function id(){
        // Rôle : retourner la valeur de la clé primaire
        // Paramètres : néant
        // Retour : valeur de l'id ou 0

        if(isset($this->id)){
            return $this->id;
        } else {
            return 0;
        }
    }


    // Méthodes getters pour recupérer les attributs du modèle conceptuel, 

    function getPseudo(){
        // Rôle : retourne le pseudo ou ""
        // Paramètres : néant
        // Retour : le pseudo ou ""

        if (empty($this->pseudo)) {                
            return "";
        } else {
            return $this->pseudo;
        }

    }

    function getDate(){
        // Rôle : retourne la date d'enregistrement ou ""
        // Paramètres : néant
        // Retour : la date d'enregistrement ou ""

        if (empty($this->date)) {                
            return "";
        } else {
            return $this->date;
        }

    }

    function getHeure(){
        // Rôle : retourne l'heure d'enregistrement ou ""
        // Paramètres : néant
        // Retour : le titre d'enregistrement ou ""

        if (empty($this->heure)) {                
            return "";
        } else {
            return $this->heure;
        }

    }

    function getReponse(){
        // Rôle : retourne la reponse ou ""
        // Paramètres : néant
        // Retour : la reponse ou ""

        if (empty($this->reponse)) {                
            return "";
        } else {
            return $this->reponse;
        }

    }

    function getIdQuestion(){
        // Rôle : retourne l'id de la question ou ""
        // Paramètres : néant
        // Retour : l'id de la question ou ""

        if (empty($this->idQuestion)) {                
            return "";
        } else {
            return $this->idQuestion;
        }

    }




    // Mèthodes setters pour modifier les attributs

    function setPseudo($valeur){
        // Rôle : modifier (ou initialiser) la valeur de mon attribut pseudo
        // Paramètres : 
        //      $valeur : novelle valeur
        // Retour : true si valeur accepté, false sinon

        // ON met $valeur dans l'attribut
        $this->pseudo = $valeur;
        // Retourner true
        return true;

    }

    function setDate($valeur){
        // Rôle : modifier (ou initialiser) la valeur de mon attribut date
        // Paramètres : 
        //      $valeur : novelle valeur
        // Retour : true si valeur accepté, false sinon

        // ON met $valeur dans l'attribut
        $this->date = $valeur;
        // Retourner true
        return true;
    }

    function setHeure($valeur){
        // Rôle : modifier (ou initialiser) la valeur de mon attribut heure
        // Paramètres : 
        //      $valeur : novelle valeur
        // Retour : true si valeur accepté, false sinon

        // ON met $valeur dans l'attribut
        $this->heure = $valeur;
        // Retourner true
        return true;
    }

    function setReponse($valeur){
        // Rôle : modifier (ou initialiser) la valeur de mon attribut reponse
        // Paramètres : 
        //      $valeur : novelle valeur
        // Retour : true si valeur accepté, false sinon

        // ON met $valeur dans l'attribut
        $this->reponse = $valeur;
        // Retourner true
        return true;
    }

    function setIdQuestion($valeur){
        // Rôle : modifier (ou initialiser) la valeur de mon attribut reponse
        // Paramètres : 
        //      $valeur : novelle valeur
        // Retour : true si valeur accepté, false sinon

        // ON met $valeur dans l'attribut
        $this->idQuestion = $valeur;
        // Retourner true
        return true;
    }

    // Mèthodes pour accéder la BDD
    // Spécifier les fonctions standards


    function loadFromId($id){
        // Rôle : charger un ligne de la base de données d'un id dans l'objet (valoriser de la la BDD)
        // Paramètres :
        //      $id : id à aller chercher
        // Retour : true si on l'a trouvé, false sinon

        // On prépare la requête
        $sql = "SELECT `id`, `pseudo`, `date`, `heure`, `reponse`, `question_id` FROM `reponses` WHERE `id` = :id";

        // On prépare $param
        $param = [":id" => $id];

        // Utilisation de la function getRecord()
        $ligne = bddGetRecord($sql, $param);

        // renvoi false si vide
        if(empty($ligne)){
            return false;
        }

        // Valoriser les atttributs avec les infos de la ligne
        $this->loadFromTab($ligne);

        // Retourne final
        return $this->isloaded();

    }

    function listAll(){
        // Rôle : extraire de la base de données toutes les lignes
        // Paramètres : néant
        // Retour : liste indexée par l'id d'objets de la classe reponse

        // Construire la requête SELECT
        $sql = "SELECT `pseudo`, `date`, `heure`, `reponse`, `question_id` FROM `reponses`";

        // L'exécuter pour récupérer une liste de lignes (tableau non indexés de tableaux indexés)
        $lignes = bddGetRecords($sql);
        
        // Convertir ce tableau en tableau indexé (par l'id) d'objets de la classe reponse
        return $this->listBddToListObj($lignes);

    }

    function insert(){
        // Rôle : créer l'objet courant dans la base de données
        // Paramètres : néant
        // Retour : true si réussi, false si échoué

        // On utilise bddInsert
        $id = bddInsert("reponses", $this->makeTab());
        if (empty($id)) {
            return false;
        }

        $this->id = $id;
        return true;
        
    }

    function update() {
        // Rôle : mettre à jour les valeurs courante des attributs de l'objet  dans la bdd
        // Paramètres : néant
        // Retour : true si réussi, false si échoué

        // On utilise bddUpdate
        return bddUpdate("reponses", $this->makeTab(), $this->id());
    
    }

    function listForQuestion($idQuestion){
        // Rôle : extraire les reponses d'une question donnée
        // Paramètre :
        //      $idQuestion : id de la question
        // Retour : tableau indexé par l'id de la reponse d'objets de la classe reponse

        // Construire la requête SELECT  
        $sql = "SELECT `id`, `pseudo`, `date`, `heure`, `reponse`, `question_id` FROM `reponses` WHERE `question_id` = :question_id";
        $param = [ ":question_id" => $idQuestion ];

        // L'exécuter pour récupérer une liste de lignes (tableau non indexés de tableaux indexés)
        $lignes = bddGetRecords($sql, $param);

        // Convertir ce tableau en tableau indexé (par l'id) d'objets de la classe reponse
        return $this->listBddToListObj($lignes);
    }



    // Méthodes utilitaires

    function loadFromTab($champs) {
        // Rôle : initialier, valorise les attributs (y compris l'id) avec les infos contenues dans un tableau
        // Paramètres : 
        //      $champs : tableau indexé, dont les index sont des noms des champs (du modèle physique)
        // Retour : true si OK, false sinon

        // Pour chaque attribut de la reponse,
        // si il est dans dans le tableau : on change sa valeur
        if (isset($champs["id"])) $this->id = $champs["id"];
        if (isset($champs["question_id"])) $this->setIdQuestion($champs["question_id"]);
        if (isset($champs["pseudo"])) $this->setPseudo($champs["pseudo"]);
        if (isset($champs["date"])) $this->setDate($champs["date"]);
        if (isset($champs["heure"])) $this->setHeure($champs["heure"]);
        if (isset($champs["reponse"])) $this->setReponse($champs["reponse"]);
        return true;

    }

    function listBddToListObj($tab) {
        // Rôle : transformer un tableau simple de tableaux indexés par les champs de la table reponses un tableau indexé par l'id,
        // d'objets de la classe reponse
        // Paramètres :
        //   $tab : le tableau à transformer
        // Retour : le tableau indexé par l'id, d'objets de la classe reponse

        // Préparer un tableau résultat vide
        $resultat = [];

        // Pour chaque elt du tableau $tab :
        foreach($tab as $tabReponse) {
            // Instancier un objet article
            $reponse = new reponse();
            // Le charger avec l'élemnt du tableau
            $reponse->loadFromTab($tabReponse);
            // le mettre dans $resultat (au bon index)
            $index = $reponse->id();
            $resultat[$index] = $reponse;

        }

        // Retour $resultat
        return $resultat;
    }

    function makeTab() {
        // Rôle : extraire un tableau des valeurs des champs (or clé primaire)
        // Paramètres : néant
        // Retour : tableau indexé

        return [
            "pseudo" => $this->pseudo,
            "date" => $this->date,
            "heure" => $this->heure,
            "reponse" => $this->reponse,
            "question_id" => $this->idQuestion,
        ];

    }

}