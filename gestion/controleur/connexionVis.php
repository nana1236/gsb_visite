<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/authentification.php";
include_once "$racine/modele/visiteurBD.php";
include_once "$racine/modele/visiteur.php";

// Récupération des données POST
if (isset($_POST["loginVis"]) && isset($_POST["mdpVis"])) {
    $loginVis = $_POST['loginVis'];
    $mdpVis = $_POST['mdpVis'];

    $visiteurBD = new visiteurBD();
    $visiteur = $visiteurBD->getVisiteurByLogin($loginVis);

    if (!$visiteur) {
        $erreur = "Le login et le mot de passe saisis sont incorrects ou inexistants !";
    } else {
        $connexionReussie = login($loginVis, $mdpVis);
        if (!$connexionReussie) {
            // Définissez un message d'erreur
            $erreur = "Le login et le mot de passe saisis sont incorrects ou inexistants !";
        }
    }
}

if (isLoggedOn()) {
    include "accueil.php";
} else {
    // L'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    $titre = "Connexion";
    include "$racine/vue/enteteAuth.php";
    include "$racine/vue/connexionVis.php";
}
?>
