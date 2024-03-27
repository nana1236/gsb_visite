<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix du médecin</title>
    <link rel="stylesheet" href="../css/inscription.css">
</head>
<body>
    <div class="titre">
        <div class="monprofil">
            <br>
            <br>
            <br>
            <select name="choix" id="choix" onchange="afficherInfosMedecin()">
                <option value="" disabled selected>Choisir un médecin</option>
                <?php 
                    // Afficher les médecins dans la liste déroulante
                    foreach ($medecins as $medecin) {
                        echo "<option value='".$medecin->getID()."'>".$medecin->getNomMed()." ".$medecin->getPrenomMed()." - ".$medecin->getDepartementMed()."</option>";
                    }
                ?> 
            </select>
            <br>
            <!-- Div pour afficher les informations du médecin sélectionné -->
            <div id="informationsMedecin"></div>
            <br>
            <!-- Bouton "Choisir" initialement caché -->
            <a id="lienChoisir" href="#"><button id="btnChoisir" class="modif-rapp" type="button" style="visibility: hidden;">Choisir</button></a>
        </div>
    </div>

    <!-- Script JavaScript pour afficher les informations du médecin sélectionné -->
    <script>
        function afficherInfosMedecin() {
            // Récupérer la sélection du médecin
            var selectElement = document.getElementById("choix");
            var selectedMedecinId = selectElement.value;

            // Récupérer les informations du médecin sélectionné
            var informationsMedecinDiv = document.getElementById("informationsMedecin");
            informationsMedecinDiv.innerHTML = "";

            // Parcourir tous les médecins pour trouver celui qui correspond à l'ID sélectionné
            <?php foreach ($medecins as $medecin) { ?>
                if ("<?php echo $medecin->getID(); ?>" === selectedMedecinId) {
                    // Construire le texte à afficher avec toutes les informations du médecin sélectionné
                    var informationsText =
                                            "<p><strong>Nom:</strong> <?php echo $medecin->getNomMed(); ?></p>" +
                                            "<p><strong>Prénom:</strong> <?php echo $medecin->getPrenomMed(); ?></p>" +
                                            "<p><strong>Département:</strong> <?php echo $medecin->getDepartementMed(); ?></p>" +
                                            "<p><strong>Spécialité:</strong> <?php echo $medecin->getSpecialiteMed(); ?></p>";

                    // Afficher les informations du médecin sélectionné dans la div dédiée
                    informationsMedecinDiv.innerHTML = informationsText;

                    // Mettre à jour le lien du bouton "Choisir" avec l'ID du médecin sélectionné
                    document.getElementById("lienChoisir").href = "./?action=ajoutRapport&id_medecin=<?php echo $medecin->getID(); ?>";

                    // Rendre visible le bouton "Choisir"
                    document.getElementById("btnChoisir").style.visibility = "visible";
                }
            <?php } ?>
        }
    </script>
</body>
</html>
