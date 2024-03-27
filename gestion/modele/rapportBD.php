<?php
include_once "rapport.php";

class rapportBD
{
    private $conn;

    public function __construct()
    {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addRapport($rapport)
    {
        try {
            $req = $this->conn->prepare("INSERT INTO rapport (id_rapport, motif, bilan, date_rapport, id_visiteur, id_medecin) values (:id_rapport, :motif, :bilan, :date_rapport, :id_visiteur, :id_medecin)");
            $req->bindValue(':id_rapport', $rapport->getID());
            $req->bindValue(':motif', $rapport->getMotif());
            $req->bindValue(':bilan', $rapport->getBilan());
            $req->bindValue(':date_rapport', $rapport->getDateRapport());
            $req->bindValue(':id_visiteur', $rapport->getIdVisiteur());
            $req->bindValue(':id_medecin', $rapport->getIdMedecin());
            $req->execute();

            // Récupérer l'ID de la personne ajoutée
            $lastInsertedID = $this->conn->lastInsertId();
    
            // Retourner l'objet personne avec l'ID attribué
            return $this->getRapportByID($lastInsertedID);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getRapports()
    {
        try {
            $req = $this->conn->prepare("SELECT * from rapport");
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

            if ($resultat) {
                foreach ($resultat as $ligne ) {
                    $rapport = new rapport(
                        $ligne["id_rapport"],
                        $ligne["motif"],
                        $ligne["bilan"],
                        $ligne["date_rapport"],
                        $ligne["id_visiteur"],
                        $ligne["id_medecin"]
                    );
                    $rapports[] = $rapport;
                }
                return $rapports;
            }
            else{
                return null;
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getRapportById($id_rapport)
    {
        try {
            $req = $this->conn->prepare("SELECT * FROM rapport WHERE id_rapport=:id_rapport");
            $req->bindValue(":id_rapport", $id_rapport);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

            if ($resultat) {
                foreach ($resultat as $ligne ) {
                    $rapport = new rapport(
                        $ligne["id_rapport"],
                        $ligne["motif"],
                        $ligne["bilan"],
                        $ligne["date_rapport"],
                        $ligne["id_visiteur"],
                        $ligne["id_medecin"]
                    );
                    $rapports[] = $rapport;
                }
                return $rapports;
            }
            else{
                return null;
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getRapportByIdVis($id_visiteur)
    {
        try {
            $req = $this->conn->prepare("SELECT * FROM rapport WHERE id_visiteur=:id_visiteur");
            $req->bindValue(":id_visiteur", $id_visiteur);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

            if ($resultat) {
                foreach ($resultat as $ligne ) {
                    $rapport = new rapport(
                        $ligne["id_rapport"],
                        $ligne["motif"],
                        $ligne["bilan"],
                        $ligne["date_rapport"],
                        $ligne["id_visiteur"],
                        $ligne["id_medecin"]
                    );
                    $rapports[] = $rapport;
                }
                return $rapports;
            }
            else{
                return null;
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}
?>