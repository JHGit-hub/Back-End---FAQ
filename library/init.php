<?PHP

// Initialisations communes à tous les controleurs 

// affichage des messages d'erreurs
ini_set('display_errors',1);
error_reporting(E_ALL);

// Charger les librairies
include_once "library/bdd.php";

// Charger les différents classes de modèle de données
include_once "model/questions.php";
include_once "model/reponses.php";

// Ouvrir la BDD dans la variable globale $bdd
global $bdd;
$bdd = new PDO("variable globale $bdd");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING) ;  // En mise au point seulement
