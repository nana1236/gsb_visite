<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/connexionPDO.php";
include_once "$racine/modele/authentification.php";
include_once "$racine/modele/visiteurBD.php";
include_once "$racine/modele/visiteur.php";

// Appel du script de vue qui permet de gérer l'affichage des données
$titre = "Accueil - Gestion_Des_Medicaments.fr";
include "$racine/vue/entete.php";

// Passer la variable $estAjoute à la vue
include "$racine/vue/vueGererRapport.php";
?>