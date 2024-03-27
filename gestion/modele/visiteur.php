<?php

class visiteur
{
    private $id_visiteur;
    private $nomVis;
    private $prenomVis;
    private $mailVis;
    private $loginVis;
    private $mdpVis;
    private $ageVis;
    private $dateEmbauche;

    public function __construct($id_visiteur, $nomVis, $prenomVis, $mailVis, $loginVis, $mdpVis, $ageVis, $dateEmbauche)
    {
        $this->id_visiteur = $id_visiteur;
        $this->nomVis = $nomVis;
        $this->prenomVis = $prenomVis;
        $this->mailVis = $mailVis;
        $this->loginVis = $loginVis;
        $this->mdpVis = $mdpVis;
        $this->ageVis = $ageVis;
        $this->dateEmbauche = $dateEmbauche;
    }

    public function getID()
    {
        return $this->id_visiteur;
    }

    public function getNom()
    {
        return $this->nomVis;
    }

    public function getPrenom()
    {
        return $this->prenomVis;
    }

    public function getMail()
    {
        return $this->mailVis;
    }

    public function getLogin()
    {
        return $this->loginVis;
    }

    public function getMdp()
    {
        return $this->mdpVis;
    }

    public function getAge()
    {
        return $this->ageVis;
    }

    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    public function setLogin($login): void
    {
        $this->loginVis = $login;
    }

    public function setMdp($mdp): void
    {
        $this->mdpVis = password_hash($mdp, PASSWORD_DEFAULT);;
    }

    public function updateMdp($nouveauMdp): void
    {
        // Cette méthode permet de mettre à jour le mot de passe sans re-hasher
        $this->mdpVis = password_hash($nouveauMdp, PASSWORD_DEFAULT);
    }
 
    public function setDateEmbauche($dateEmbauche): void
    {
        $this->dateEmbauche = $dateEmbauche;
    }

}
?>