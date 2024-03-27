<?php

function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["devMembre"] = "devenirMembre.php";
    $lesActions["ajoutVisiteur"] = "ajoutVisiteur.php";
    $lesActions["ajoutMedecin"] = "ajoutMedecin.php";
    $lesActions["choixMedecin"] = "choixMedecin.php";
    $lesActions["mesRapports"] = "mesRapports.php";
    $lesActions["ajoutRapport"] = "ajoutRapport.php";
    $lesActions["connexionVis"] = "connexionVis.php";
    $lesActions["profilVis"] = "profilVisiteur.php";
    $lesActions["deconnexion"] = "deconnecterVis.php";
    $lesActions["gererRapp"] = "gererRapport.php";

    if (array_key_exists ($action, $lesActions)){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}

?>