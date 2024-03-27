<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/connexionPDO.php";
include_once "$racine/modele/authentification.php";
include_once "$racine/modele/rapportBD.php";
include_once "$racine/modele/rapport.php";
include_once "$racine/modele/visiteurBD.php";
include_once "$racine/modele/visiteur.php";
include_once "$racine/modele/medecinBD.php";
include_once "$racine/modele/medecin.php";


$loginVis = getLoginLoggedOn();

$visiteurBD = new visiteurBD();
$visiteur = $visiteurBD->getVisiteurByLogin($loginVis);
$id_visiteur = $visiteur->getID();

$rapportBD = new rapportBD();
$rapports = $rapportBD->getRapportByIdVis($id_visiteur);

$medecinBD = new medecinBD();

// Passer la variable $estAjoute à la vue
include "$racine/vue/mesRapports.php";
?>