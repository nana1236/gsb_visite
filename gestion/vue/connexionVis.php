<link rel="stylesheet" href='../css/connexion.css'>
<div class="conn-e">
<h1>Connexion</h1>
</div>
<?php
    if (isset($erreur)) {
        echo "<div class='erreur-msg-mdp'>$erreur</div>";
    }
?>
<form action="./?action=connexionVis" method="POST">
<div class="conn">
    <input type="text" name="loginVis" placeholder="Login" /><br />
    <input type="password" name="mdpVis" placeholder="Mot de passe"  /><br />
    <input type="submit" />
</div>
</form>
<br />

<div class= "b">
<a href="./?action=devMembre">Devenir Membre</a>
</div>