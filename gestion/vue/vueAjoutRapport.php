<html>
<head>
    <title>Gestion Des Rapports</title>
    <link rel="stylesheet" href='../css/ajtRp.css'>
</head>
<body>
<div class="title">
    <h1>AJOUT UN RAPPORT<h1>
</div>
<?php if(isLoggedOn()){ ?>
    <!-- Profil -->
<a href="./?action=profilVis"><button class="profil" type="button">Mon Profil</button></a>
<a href="./?action=choixMedecin"><button class="retour" type="button">Retour</button></a>

<?php }else{ ?>
        <a href="./?action=connexionVis"><button class="btn-connexion" type="button">Connexion</button></a>
        <a href="./?action=devMembre"><button class="btn-inscription" type="button">Devenir Membre</button></a>
<?php } ?>

<div class="formulaire">
<!-- vueAjoutRapport.php -->
<form action="./?action=ajoutRapport&id_medecin=<?php echo $id_medecin ?>" method="post">
    <label for="motif">Motif :</label>
    <input type="text" name="motif" id="motif" required>
    <br>
    <label for="bilan">Bilan :</label>
    <textarea name="bilan" id="bilan" rows="4" required></textarea>
    <br>
    <label for="choix_medecin">Médecin : <?php echo $nomMed . ' ' . $prenomMed; ?></label>
    <br>
    <button type="submit">Ajouter le rapport</button>
</form>
</div>
