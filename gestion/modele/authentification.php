<?php
    include_once "connexionPDO.php";
    include_once "visiteurBD.php";


    function login($loginVis, $mdpVis)
    {
    if (!isset($_SESSION)) {
        session_start();
    }

    $visiteurBD = new visiteurBD();
    $visiteur = $visiteurBD->getVisiteurByLogin($loginVis);

    if ($visiteur) {
        // Récupérer le mot de passe haché de la base de données
        $mdpBD = $visiteur->getMdp();

        // Vérifier si le mot de passe fourni correspond au mot de passe haché
        if (password_verify(trim($mdpVis), trim($mdpBD))) {
            // Le mot de passe est correct
            $_SESSION["loginVis"] = $loginVis;
            $_SESSION["mdpVis"] = $mdpBD;
            // Ajoutez d'autres informations de session si nécessaire
            return true; // Connexion réussie
        } else {
            // Le mot de passe est incorrect
            // Gérer cet état, par exemple, en affichant un message d'erreur ou en redirigeant
            return false; // Connexion échouée
        }
    }
}

    function logout() {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["loginVis"]);
        unset($_SESSION["mdpVis"]);
    }

    function getLoginLoggedOn(){
        if (isLoggedOn()){
            $ret = $_SESSION["loginVis"];
        }
        else {
            $ret = null;
        }
        return $ret;
    }

    function isLoggedOn() {
        if (!isset($_SESSION)) {
            session_start();
        }
        $ret = false;
    
        if (isset($_SESSION["loginVis"])) {
            $VisiteurBD = new visiteurBD();
            $visiteur = $VisiteurBD->getVisiteurByLogin($_SESSION["loginVis"]);
            if ($visiteur && $visiteur->getLogin() == $_SESSION["loginVis"] && $visiteur->getMdp() == $_SESSION["mdpVis"]
            ) {
                $ret = true;
            }
        }
        return $ret;
    }

function Incorrect(){
    echo "<div class='erreur-message'>Le login et le mot de passe saisie sont incorrects ou inexistants .</div>";
}

function champsNonRenseigner(){
    echo "<div class='erreur-message'>Renseigner tous les champs ...</div>";
}

function loginExiste(){
    echo "<div class='erreur-message1'>Ce login existe déjà .</div>";
}

function visitNonEnreg(){
    echo "<div class='erreur-message'>Le visiteur n'a pas été enregistré .</div>";
}

function MDPnonIdentique(){
    echo "<div class='erreur-mdp'>Les mots de passe saisis ne sont pas identiques .</div>";
}