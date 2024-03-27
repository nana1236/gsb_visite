<?php

class medecin
{
    private $id_medecin;
    private $nomMed;
    private $prenomMed;
    private $departementMed;
    private $specialiteMed;

    public function __construct($id_medecin, $nomMed, $prenomMed, $departementMed, $specialiteMed)
    {
        $this->id_medecin = $id_medecin;
        $this->nomMed = $nomMed;
        $this->prenomMed = $prenomMed;
        $this->departementMed = $departementMed;
        $this->specialiteMed = $specialiteMed;
    }

    public function getID()
    {
        return $this->id_medecin;
    }

    public function getNomMed()
    {
        return $this->nomMed;
    }

    public function getPrenomMed()
    {
        return $this->prenomMed;
    }

    public function getDepartementMed()
    {
        return $this->departementMed;
    }

    public function getSpecialiteMed()
    {
        return $this->specialiteMed;
    }
}
?>