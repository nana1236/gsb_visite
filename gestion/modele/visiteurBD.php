<?php
include_once "visiteur.php";
class visiteurBD 
{
    private $conn;


    public function __construct()
    {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addVisiteur($visiteur)
    {
        $mdp = $visiteur->getMdp();
        $mdpHash = password_hash($mdp, PASSWORD_BCRYPT);

        try {
            $req = $this->conn->prepare("INSERT INTO visiteur (id_visiteur, nomVis, prenomVis, mailVis, loginVis, mdpVis, ageVis, dateEmbauche) values (:id_visiteur, :nomVis, :prenomVis, :mailVis, :loginVis, :mdpVis, :ageVis, :dateEmbauche)");
            $req->bindValue(':id_visiteur', $visiteur->getID());
            $req->bindValue(':nomVis', $visiteur->getNom());
            $req->bindValue(':prenomVis', $visiteur->getPrenom());
            $req->bindValue(':mailVis', $visiteur->getMail());
            $req->bindValue(':loginVis', $visiteur->getLogin());
            $req->bindValue(':mdpVis', $mdpHash);
            $req->bindValue(':ageVis', $visiteur->getAge());
            $req->bindValue(':dateEmbauche', $visiteur->getDateEmbauche());
            $req->execute();

            // Récupérer l'ID de la personne ajoutée
            $lastInsertedID = $this->conn->lastInsertId();
    
            // Retourner l'objet personne avec l'ID attribué
            return $this->getVisiteurByID($lastInsertedID);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }

    public function getVisiteurs()
    {
        try {
            $req = $this->conn->prepare("SELECT * from visiteur");
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

            if ($resultat) {
                foreach ($resultat as $ligne ) {
                    $visiteur = new visiteur(
                        $ligne["id_visiteur"],
                        $ligne["nomVis"],
                        $ligne["prenomVis"],
                        $ligne["mailVis"],
                        $ligne["loginVis"],
                        $ligne["mdpVis"],
                        $ligne["ageVis"],
                        $ligne["dateEmbauche"]
                    );
                    $visiteurs[] = $visiteur;
                }
                return $visiteurs;
            }
            else{
                return null;
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getVisiteurById($id_visiteur){
        try{
            $req = $this->conn->prepare("SELECT * FROM visiteur WHERE id_visiteur=:id_visiteur");
            $req->bindValue(":id_visiteur", $id_visiteur);

            $req->execute();

            $resultat=$req->fetch(PDO::FETCH_ASSOC);
            if($resultat){
                $visiteur = new Visiteur(
                    $resultat["id_visiteur"],
                    $resultat["nomVis"],
                    $resultat["prenomVis"],
                    $resultat["mailVis"],
                    $resultat["loginVis"],
                    $resultat["mdpVis"],
                    $resultat["ageVis"],
                    $resultat["dateEmbauche"]
                );
                return $visiteur;
            }
            else{
                return null;
            }

        } catch(PDOException $e){
            print "Erreur !: ". $e->getMessage();
            die();
        }
    }

    public function getVisiteurByLogin($loginVis)
    {
        try {
            $req = $this->conn->prepare("SELECT * from visiteur where loginVis=:loginVis");
            $req->bindValue(':loginVis', $loginVis);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);

            if($resultat){
                return new visiteur(
                    $resultat["id_visiteur"],
                    $resultat["nomVis"],
                    $resultat["prenomVis"],
                    $resultat["mailVis"],
                    $resultat["loginVis"],
                    $resultat["mdpVis"],
                    $resultat["ageVis"],
                    $resultat["dateEmbauche"]
                );
            }
            else{
                return null;
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getVisiteurByMail($email)
    {
        try {
            $req = $this->conn->prepare("SELECT * from visiteur where mailVis=:mailVis");
            $req->bindValue(':mailVis', $email);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);

            if($resultat){
                return new visiteur(
                    $resultat["id_visiteur"],
                    $resultat["nomVis"],
                    $resultat["prenomVis"],
                    $resultat["mailVis"],
                    $resultat["loginVis"],
                    $resultat["mdpVis"],
                    $resultat["ageVis"],
                    $resultat["dateEmbauche"]
                );
            }
            else{
                return null;
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function loginDejaPris($loginVis)
    {
        try {
            $req = $this->conn->prepare("SELECT COUNT(*) FROM visiteur WHERE loginVis = :loginVis");
            $req->bindParam(':loginVis', $loginVis);
            $req->execute();
            $count = $req->fetchColumn();

            return $count > 0;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getVisiteurNomByID($id)
    {
    try {
        $req = $this->conn->prepare(
        "SELECT Personne.nom
        FROM Personne
        JOIN Visiteur ON Personne.ID_Personne = Visiteur.ID_Personne
        WHERE Visiteur.ID_Personne = :ID_Personne");
        $req->bindParam(':id', $id);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if ($resultat) {
            return $resultat['nom'];
        } else {
            return null;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    }

    public function getVisiteurPrenomByID($id)
    {
    try {
        $req = $this->conn->prepare(
        "SELECT Personne.prenom
        FROM Personne
        JOIN Visiteur ON Personne.ID_Personne = Visiteur.ID_Personne
        WHERE Visiteur.ID_Personne = :ID_Personne");
        $req->bindParam(':id', $id);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if ($resultat) {
            return $resultat['prenom'];
        } else {
            return null;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    }
    
    public function getAdrByIdPers($id)
    {
    try {
        $req = $this->conn->prepare('
        SELECT Adresse.Adresse, Adresse.Complément, Adresse.Code_Postal, Adresse.Ville
        FROM Personne
        JOIN Habiter ON Personne.ID_Personne = Habiter.ID_Personne
        JOIN Adresse ON Habiter.ID_Adresse = Adresse.ID_Adresse
        WHERE Personne.ID_Personne = :idPersonne
    ');
        $req->bindParam(':ID_Personne', $id);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if ($resultat) {
            return $resultat['adresse'];
        } else {
            return null;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    }

    public function getMDPByLogin($login)
    {
    try {
        $req = $this->conn->prepare("SELECT mdp FROM visiteur WHERE login = :login");
        $req->bindParam(':login', $login);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if ($resultat) {
            return $resultat['mdp'];
        } else {
            return null;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    }

    public function updtMdpVisiteur($visiteur, $mdpNouveau) 
    {
        $resultat = -1;
        try {
            $mdpAncien = $this->getMDPByLogin($visiteur->getLogin());
    
            if (password_verify($mdpNouveau['ancien'], $mdpAncien)) {
            $mdpHash = password_hash($mdpNouveau['nouveau'], PASSWORD_BCRYPT );
            $req = $this->conn->prepare("UPDATE visiteur set mdp=:mdp where idV=:idV");
            $req->bindValue(':idV', $visiteur->getIdV(), PDO::PARAM_STR);
            $req->bindValue(':mdp', $mdpHash, PDO::PARAM_STR);

            $resultat = $req->execute();
            }else{
                $resultat = 0;
            }
        }
        catch (PDOException $e) 
        {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function msgErrChmpsMDP()
    {
        print "<div class='erreur-msg-mdp'>Veuillez remplir tous les champs liés au mot de passe.</div>";
    }

}

?>