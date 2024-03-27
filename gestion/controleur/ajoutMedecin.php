<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/medecin.php";
include_once "$racine/modele/medecinBD.php";
include_once "$racine/modele/connexionPDO.php";
include_once "$racine/modele/authentification.php";

$inscrit = false;

$bd = new medecinBD();
// Vérification si tous les champs sont définis et non vides
if (!empty($_POST["nomMed"]) && !empty($_POST["prenomMed"]) && !empty($_POST["departementMed"]) && !empty($_POST["specialiteMed"])) {

            // Récupération des données du formulaire
            $nomMed = $_POST["nomMed"];
            $prenomMed = $_POST["prenomMed"];
            $departementMed = $_POST["departementMed"];
            $specialiteMed = $_POST["specialiteMed"];

            // Création d'un objet visiteur
            $medecin = new medecin(NULL, $nomMed, $prenomMed, $departementMed, $specialiteMed);

            // Ajout du visiteur dans la base de données
            $nouveauMedecin = $bd->addMedecin($medecin);

            if ($nouveauMedecin) {
                // Redirection vers la page de profil avec l'ID du visiteur ajouté
                header("Location: ./?action=defaut");
                exit(); // Arrêt de l'exécution du script après la redirection
            } else {
                echo "Erreur : inscription non réussie. Veuillez réessayer.";
            }
        } else {
            include "$racine/vue/vueDevMembre.php";
        }
?>