<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/medecin.php";
include_once "$racine/modele/medecinBD.php";
include_once "$racine/modele/visiteur.php";
include_once "$racine/modele/visiteurBD.php";
include_once "$racine/modele/rapport.php";
include_once "$racine/modele/rapportBD.php";
include_once "$racine/modele/connexionPDO.php";
include_once "$racine/modele/authentification.php";

$id_medecin = isset($_GET['id_medecin']) ? $_GET['id_medecin'] : null;

$medecinBD = new medecinBD();

$medecin = $medecinBD->getMedecinById($id_medecin);
$prenomMed = $medecin->getPrenomMed();
$nomMed = $medecin->getNomMed();

$loginVis = getLoginLoggedOn();
$visiteurBD = new visiteurBD();
$visiteur = $visiteurBD->getVisiteurByLogin($loginVis);
$id_visiteur = $visiteur->getID();

// Vérification si tous les champs sont définis et non vides
if (!empty($_POST["motif"]) && !empty($_POST["bilan"])) {

            // Récupération des données du formulaire
            $motif = $_POST["motif"];
            $bilan = $_POST["bilan"];
            $date_rapport = date("Y-m-d");

            $rapport = new rapport(NULL, $motif, $bilan, $date_rapport, $id_visiteur, $id_medecin);

            $rapportBD = new rapportBD();
            // Ajout du visiteur dans la base de données
            $nouveauRapport = $rapportBD->addRapport($rapport);

            if ($nouveauRapport) {
                // Redirection vers la page de profil avec l'ID du visiteur ajouté
                header("Location: ./?action=defaut");
                exit(); // Arrêt de l'exécution du script après la redirection
            } else {
                echo "Erreur : Rapport non réussie. Veuillez réessayer.";
            }
        } else {
            include "$racine/vue/vueAjoutRapport.php";
        }
?>