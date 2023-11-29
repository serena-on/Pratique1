<?php
include '../configuration/connexion.inc.php';

// Get all equipe
$equipeRequest = "SELECT * FROM Equipe";
$equipeList = $pdo->query($equipeRequest);
$equipes = $equipeList->fetchAll();


$matchrequest = "SELECT idmatch FROM Matchs ORDER BY idmatch DESC LIMIT 1";
$matchid = $pdo->query($matchrequest);
$idmatch = $matchid->fetchAll();
$ids = $idmatch[0]['idmatch']+=1;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <script src="../css/bootstrap/js/bootstrap.js"></script>
    <title>Creation d'un match</title>
</head>

<body>
    <div class="container mt-5">
        <a href="./menu.php" class="btn btn-secondary mt-5" style="margin-bottom: 20px; margin-left: 0;">Retour à la liste</a>
        <div class="col-md-12 shadow p-3 bg-body rounded">
            <div class="card">
                <div class="card-header">
                    <h5>Creer un match</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="../back/store_match.php">

                        <div class="row col-md-12">
                            <div class="mb-2 col">
                                <div>
                                    <label for="idmatch" class="col-md-3 col-form-label">Numéro</label>
                                </div>

                                <div class="col">
                                    <input id="idmatch" name="idmatch" type="number" class="form-control" readonly value="<?= $ids?>">
                                </div>
                            </div>

                            <div class="mb-2 col">
                                <div>
                                    <label for="date" class="col col-form-label">Date</label>
                                </div>

                                <div class="col">
                                    <input id="date" name="date" type="date" class="form-control" autofocus required>
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="mb-2 col">
                                <div>
                                    <label for="lieu" class="col col-form-label">Lieu</label>
                                </div>

                                <div class="col">
                                    <input id="lieu" type="text" class="form-control" name="lieu" autocomplete="lieu" required>
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12 mt-4">
                            <div class="col">
                                <select class="form-control" name="idequipe1" id="idequipe1" required>
                                    <option value="">Veuillez selectionner une équipe</option>
                                    <?php foreach ($equipes as $equipe) : ?>
                                        <option value="<?= $equipe['idequipe'] ?>"><?= $equipe['nomequipe'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-control" name="idequipe2" id="idequipe2" required>
                                    <option value="">Veuillez selectionner une équipe</option>
                                    <?php foreach ($equipes as $equipe) : ?>
                                        <option value="<?= $equipe['idequipe'] ?>"><?= $equipe['nomequipe'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex">
                            <input type="submit" class="btn btn-primary mt-4" value="Enregistrer">&nbsp;
                            <input type="reset" class="btn btn-danger mt-4" value="Annuler">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>