<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/medecin.php";
include_once "$racine/modele/medecinBD.php";
include_once "$racine/modele/connexionPDO.php";
include_once "$racine/modele/authentification.php";

$inscrit = false;

$medecinDB = new medecinBD();
$medecins = $medecinDB->getMedecins();

include "$racine/vue/enteteAuth.php";
include "$racine/vue/vueChoixMedecin.php";
?>