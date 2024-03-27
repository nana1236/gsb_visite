<?php if(isLoggedOn()){ ?>

    <a href="./?action=gererRapp"><button class="gerer-rapp" type="button">GÉRER DES RAPPORTS</button></a>

    <?php }else{ ?>

        <div class="msg-rapport">
            <h2>POUR GÉRER DES RAPPORTS, VEUILLEZ VOUS CONNECTER OU VOUS INSCRIRE</h2>
        </div>

        

    <?php } ?>

