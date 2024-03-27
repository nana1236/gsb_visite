<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/defaut.css"> <!-- Assurez-vous d'inclure votre fichier CSS -->
    <title>Gestion Des Rapports</title>
</head>
<body>
<header>
    <div class="principale">
        <div class="logo">
            <a href="#">Gestion Des Rapports</a>
        </div>
        <nav>
            <ul>
                <?php if(isLoggedOn()){ ?>
                    <li><a href="./?action=profilVis" class="profil">Mon Profil</a></li>
                <?php } else { ?>
                    <li><a href="./?action=connexionVis" class="btn-connexion">Connexion</a></li>
                    <li><a href="./?action=devMembre" class="btn-inscription">Devenir Membre</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>

<?php if(isLoggedOn()){ ?>

<a href="./?action=gererRapp"><button class="gerer-rapp" type="button">GÉRER DES RAPPORTS</button></a>

<?php }else{ ?>

    <div class="msg-rapport">
        <h2>POUR GÉRER DES RAPPORTS, VEUILLEZ VOUS CONNECTER OU VOUS INSCRIRE</h2>
    </div>

     <?php } ?>
</body>
</html>



