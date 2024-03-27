<?php

class rapport
{
    private $id_rapport;
    private $motif;
    private $bilan;
    private $dateRapport;
    private $id_visiteur;
    private $id_medecin;

    public function __construct($id_rapport, $motif, $bilan, $dateRapport, $id_visiteur, $id_medecin)
    {
        $this->id_rapport = $id_rapport;
        $this->motif = $motif;
        $this->bilan = $bilan;
        $this->dateRapport = $dateRapport;
        $this->id_visiteur = $id_visiteur;
        $this->id_medecin = $id_medecin;
    }

    public function getID()
    {
        return $this->id_rapport;
    }

    public function getMotif()
    {
        return $this->motif;
    }

    public function getBilan()
    {
        return $this->bilan;
    }

    public function getDateRapport()
    {
        return $this->dateRapport;
    }

    public function getIdVisiteur()
    {
        return $this->id_visiteur;
    }

    public function getIdMedecin()
    {
        return $this->id_medecin;
    }

    public function setDateRapport($dateRapport) {
        $this->dateRapport = $dateRapport;
    }
}

?>