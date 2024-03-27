<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.php";


logout();

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "authentification";
include "$racine/vue/enteteAuth.php";
include "$racine/vue/connexionVis.php";

?>