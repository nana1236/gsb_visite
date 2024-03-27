<?php
include_once "$racine/modele/connexionPDO.php";
include_once "$racine/modele/authentification.php";
include_once "$racine/modele/visiteurBD.php";

if (isLoggedOn()) {
    $loginVis = getLoginLoggedOn();

    $visiteurBD = new visiteurBD();
    $visiteur = $visiteurBD->getVisiteurByLogin($loginVis);
    $nomVis = $visiteur->getNom();
    $prenomVis = $visiteur->getPrenom();
    $mailVis = $visiteur->getMail();
    $ageVis = $visiteur->getAge();
    $dateEmbaucheVis = $visiteur->getDateEmbauche();

}
include "$racine/vue/enteteAuth.php";
include "$racine/vue/vueProfilVisiteur.php";