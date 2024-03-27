<?php
include_once "medecin.php";

class medecinBD
{
    private $conn;

    public function __construct()
    {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addMedecin($medecin)
    {
        try {
            $req = $this->conn->prepare("INSERT INTO medecin (id_medecin, nomMed, prenomMed, departementMed, specialiteMed) values (:id_medecin, :nomMed, :prenomMed, :departementMed, :specialiteMed)");
            $req->bindValue(':id_medecin', $medecin->getID());
            $req->bindValue(':nomMed', $medecin->getNomMed());
            $req->bindValue(':prenomMed', $medecin->getPrenomMed());
            $req->bindValue(':departementMed', $medecin->getDepartementMed());
            $req->bindValue(':specialiteMed', $medecin->getSpecialiteMed());
            $req->execute();

            // Récupérer l'ID de la personne ajoutée
            $lastInsertedID = $this->conn->lastInsertId();
    
            // Retourner l'objet personne avec l'ID attribué
            return $this->getMedecinByID($lastInsertedID);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getMedecins()
    {
        try {
            $req = $this->conn->prepare("SELECT * from medecin");
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

            if ($resultat) {
                foreach ($resultat as $ligne ) {
                    $medecin = new medecin(
                        $ligne["id_medecin"],
                        $ligne["nomMed"],
                        $ligne["prenomMed"],
                        $ligne["departementMed"],
                        $ligne["specialiteMed"]
                    );
                    $medecins[] = $medecin;
                }
                return $medecins;
            }
            else{
                return null;
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getMedecinById($id_medecin){
        try{
            $req = $this->conn->prepare("SELECT * FROM medecin WHERE id_medecin=:id_medecin");
            $req->bindValue(":id_medecin", $id_medecin);

            $req->execute();

            $resultat=$req->fetch(PDO::FETCH_ASSOC);
            if($resultat){
                $medecin = new medecin(
                    $resultat["id_medecin"],
                    $resultat["nomMed"],
                    $resultat["prenomMed"],
                    $resultat["departementMed"],
                    $resultat["specialiteMed"]
                );
                return $medecin;
            }
            else{
                return null;
            }

        } catch(PDOException $e){
            print "Erreur !: ". $e->getMessage();
            die();
        }
    }
}

?>