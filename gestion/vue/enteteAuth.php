<?php 
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Définir le lien CSS en fonction de l'action
if ($action === 'connexionVis') {
    $cssLink = '../css/connexion.css';
} elseif ($action === 'inscriptionVis') {
    $cssLink = '../css/inscription.css';
} elseif ($action === 'profilVis') {
    $cssLink = '../css/monprofil.css';
}
?>

<!-- Lien CSS -->
<link rel="stylesheet" href="<?php echo $cssLink; ?>">

<!-- Bouton Accueil -->
<a href="./?action=defaut"><button class="accueil" type="button">Accueil</button></a>
