<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Rapports</title>
    <link rel="stylesheet" href="../css/mesRapports.css"> <!-- Assurez-vous d'inclure votre fichier CSS -->
</head>
<body>
<a href="./?action=defaut"><button class="accueil" type="button">Accueil</button></a>
<a href="./?action=gererRapp"><button class="retour" type="button">Retour</button></a>
    <div class="container">
        <h1>Mes Rapports</h1>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Motif</th>
                    <th>Bilan</th>
                    <th>Médecin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rapports as $rapport) {
                    // Récupérer l'objet médecin correspondant à l'ID du médecin du rapport
                    $medecin = $medecinBD->getMedecinById($rapport->getIdMedecin());
                ?>
                    <tr>
                        <td><?php echo $rapport->getDateRapport(); ?></td>
                        <td><?php echo $rapport->getMotif(); ?></td>
                        <td><?php echo $rapport->getBilan(); ?></td>
                        <!-- Afficher le nom et le prénom du médecin -->
                        <td><?php echo $medecin->getNomMed() . " " . $medecin->getPrenomMed(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
