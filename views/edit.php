<?php
include '../configuration/connexion.inc.php';

$idJoueur = $_GET["id"];
$oeuvreRequest = "SELECT * FROM Joueur WHERE idjoueur = :idJoueur";
$smtp = $pdo->prepare($oeuvreRequest);
$smtp->bindParam(':idJoueur', $idJoueur);
$smtp->execute();
if ($smtp->execute()) {
    $oneJoueur = $smtp->fetchAll();
    if (!count($oneJoueur) > 0) {
        header("HTTP/1.0 404 Not Found");
        exit();
    }
}

// Get all equipe
$equipeRequest = "SELECT * FROM Equipe";
$equipeList = $pdo->query($equipeRequest);
$equipes = $equipeList->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <script src="../css/bootstrap/js/bootstrap.js"></script>
    <title>Modification d'une oeuvre</title>
</head>

<body>
    <div class="container mt-5">
        <a href="./menu.php" class="btn btn-secondary mt-5" style="margin-bottom: 20px; margin-left: 0;">Retour à la liste</a>
        <div class="col-md-12 shadow p-3 bg-body rounded">
            <div class="card">
                <div class="card-header">
                    <h5>Modifier un joueur</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="../back/update.php">
                        <input hidden name="id" type="text" class="form-control" value="<?= $oneJoueur[0]['idjoueur'] ?>">

                        <div class="row col-md-12">
                            <div class="mb-2 col">
                                <div>
                                    <label for="nom" class="col-md-3 col-form-label">Nom du joueur</label>
                                </div>

                                <div class="col">
                                    <input id="nom" name="nomJoueur" type="text" class="form-control" autofocus required value="<?= $oneJoueur[0]['nomjoueur'] ?>">
                                </div>
                            </div>

                            <div class="mb-2 col">
                                <div>
                                    <label for="prenom" class="col col-form-label">Prenom du joueur</label>
                                </div>

                                <div class="col">
                                    <input id="prenom" name="prenomJoueur" type="text" class="form-control" autofocus required value="<?= $oneJoueur[0]['prenomjoueur'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="mb-2 col">
                                <div>
                                    <label for="contact" class="col col-form-label">contact du joueur</label>
                                </div>

                                <div class="col">
                                    <input id="contact" type="number" class="form-control" name="contactJoueur" autocomplete="contact" required value="<?= $oneJoueur[0]['contactjoueur'] ?>">
                                </div>
                            </div>
                            <div class="mb-2 col">
                                <div>
                                    <label for="poste" class="col-md-3 col-form-label">Poste du joueur</label>
                                </div>

                                <div class="col">
                                    <input id="poste" name="posteJoueur" type="text" class="form-control" autofocus required value="<?= $oneJoueur[0]['postejoueur'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12 mt-4">
                            <div class="col">
                                <select class="form-control" name="idEquipe" id="idEquipe" required>
                                    <option value="">Veuillez selectionner une équipe</option>
                                    <?php foreach ($equipes as $equipe) : ?>
                                        <option value="<?= $equipe['idequipe'] ?>" <?= ($equipe['idequipe'] === $oneJoueur[0]['idequipe']) ? 'selected' : '' ?>><?= $equipe['nomequipe'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary mt-4" value="Enregistrer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>