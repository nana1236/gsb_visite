
<div class="profil">
    <h1>Mon Profil</h1>
    <ul>
        <strong>Nom:</strong> <?php echo $nomVis; ?><br>
        <strong>Prénom:</strong> <?php echo $prenomVis; ?><br>
        <strong>Login:</strong> <?php echo $visiteur->getLogin(); ?><br>
        <strong>Email:</strong> <?php echo $mailVis ?><br>
        <strong>Âge:</strong> <?php echo $ageVis ?><br>
        <strong>Date d'embauche:</strong> <?php echo $dateEmbaucheVis ?><br>
    </ul>

    <a href="./?action=deconnexion">Se Déconnecter</a>
</div>