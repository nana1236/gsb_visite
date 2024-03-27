<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/visiteur.php";
include_once "$racine/modele/visiteurBD.php";
include_once "$racine/modele/connexionPDO.php";
include_once "$racine/modele/authentification.php";

$inscrit = false;

$bd = new visiteurBD();
// Vérification si tous les champs sont définis et non vides
if (!empty($_POST["nomVis"]) && !empty($_POST["prenomVis"]) && !empty($_POST["mailVis"]) && !empty($_POST["loginVis"]) && !empty($_POST["mdpVis"]) && !empty($_POST["mdpVis2"]) && !empty($_POST["ageVis"]) && !empty($_POST["dateEmbauche"])) {

    // Vérification si les champs email et mots de passe sont non vides
    if ($_POST["mailVis"] != "" && $_POST["mdpVis"] != "" && $_POST["mdpVis2"] != "") {

        // Vérification si les mots de passe saisis sont identiques
        if ($_POST["mdpVis"] === $_POST["mdpVis2"]) {

            // Récupération des données du formulaire
            $nomVis = $_POST["nomVis"];
            $prenomVis = $_POST["prenomVis"];
            $mailVis = $_POST["mailVis"];
            $loginVis = $_POST["loginVis"];
            $mdpVis = $_POST["mdpVis"];
            $ageVis = $_POST["ageVis"];
            $dateEmbauche = $_POST["dateEmbauche"];

            // Création d'un objet visiteur
            $visiteur = new visiteur(NULL, $nomVis, $prenomVis, $mailVis, $loginVis, $mdpVis, $ageVis, $dateEmbauche);

            // Ajout du visiteur dans la base de données
            $nouveauVisiteur = $bd->addVisiteur($visiteur);

            if ($nouveauVisiteur) {
                // Redirection vers la page de profil avec l'ID du visiteur ajouté
                header("Location: ./?action=profil&id_visiteur=" . $nouveauVisiteur->getID());
                exit(); // Arrêt de l'exécution du script après la redirection
            } else {
                echo "Erreur : inscription non réussie. Veuillez réessayer.";
            }
        } else {
            echo "Les mots de passe saisis ne sont pas identiques !";
        }
    } else {
        echo "Veuillez renseigner tous les champs.";
    }
} else {
    echo "Erreur : tous les champs requis ne sont pas définis ou vides.";
}
?>
