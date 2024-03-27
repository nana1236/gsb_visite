<link rel="stylesheet" href="../css/inscription.css">
<body>
    <div class="titre">
        <div class="monprofil">
            <br>
            <br>
            <br>
            <label for="categorie">Je suis :</label>
            <select name="choix" id="choix">
                <option value="choix">Choisissez Votre Profession</option>
                <option value="medecin">Médecin</option>
                <option value="visiteur">Visiteur</option>
            </select>

            <form action="./?action=ajoutMedecin" method="POST">
            <div id="medecinFields" style="display: none;">
            <br>
                    <label for="nomMed">Nom :</label><br>
                    <input type="text" id="nomMed" name="nomMed" required><br>
                    <label for="prenomMed">Prénom :</label><br>
                    <input type="text" id="prenomMed" name="prenomMed" required><br>
                    <label for="departementMed">Departement Medecin :</label><br>
                    <input type="text" id="departementMed" name="departementMed" required><br>
                    <label for="specialiteMed">Spécialité :</label><br>
                    <input type="text" id="specialiteMed" name="specialiteMed" required><br>
                    <input type="submit" value="S'inscrire" />
            </div>
            </form>

            <form action="./?action=ajoutVisiteur" method="POST">
                <div id="visiteurFields" style="display: none;">
                    <label for="nomVis">Nom :</label><br>
                    <input type="text" id="nomVis" name="nomVis" required><br>
                    <label for="prenomVis">Prénom :</label><br>
                    <input type="text" id="prenomVis" name="prenomVis" required><br>
                    <label for="mailVis">Email :</label><br>
                    <input type="email" id="mailVis" name="mailVis" required><br>
                    <label for="ageVis">Âge :</label><br>
                    <input type="number" id="ageVis" name="ageVis" required><br>
                    <label for="loginVis">Login :</label><br>
                    <input type="text" id="loginVis" name="loginVis" required><br>
                    <label for="mdpVis">Mot de passe :</label><br>
                    <input type="password" id="mdpVis" name="mdpVis" required><br>
                    <label for="mdpVis2">Confirmer Mot de passe :</label><br>
                    <input type="password" id="mdpVis2" name="mdpVis2" required><br>
                    <label for="dateEmbauche">Date d'embauche :</label><br>
                    <input type="date" id="dateEmbauche" name="dateEmbauche" required><br><br>
                    <input type="submit" value="S'inscrire" />
                </div>
            </form>

        </div>
    </div>
</body>

<script>
    document.getElementById("choix").addEventListener("change", function() {
        var choix = document.getElementById("choix").value;
        var medecinFields = document.getElementById("medecinFields");
        var visiteurFields = document.getElementById("visiteurFields");

        if (choix === "medecin") {
            medecinFields.style.display = "block";
            visiteurFields.style.display = "none";
        } else if (choix === "visiteur") {
            medecinFields.style.display = "none";
            visiteurFields.style.display = "block";
        } else { // Si "Choisissez votre profession" est sélectionné
            medecinFields.style.display = "none";
            visiteurFields.style.display = "none"; // Masquer tous les champs
        }
    });
</script>
