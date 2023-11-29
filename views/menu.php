<!-- Fait par @Brice_GOUDALO ce 09/10/2023 -->
<?php
include '../configuration/connexion.inc.php';
$listjoueurRequest = "SELECT * FROM Joueur";
$smtp = $pdo->query($listjoueurRequest);
$listjoueur = $smtp->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <script src="../css/bootstrap/js/bootstrap.js"></script>
    <title>Liste des équipes</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between">
            <a href="./create.php" class="btn btn-primary mt-5" style="margin-bottom: 20px; margin-left: 0;">Nouveau</a>
            <div class="d-fex">
                <a href="./form_match.php" class="btn btn-warning mt-5" style="margin-bottom: 20px; margin-left: 0;">Match</a>
                <a href="./search.php" class="btn btn-secondary mt-5" style="margin-bottom: 20px; margin-left: 0;">Rechercher Joueur</a>
            </div>
        </div>
        <div class="col-md-12 shadow p-3 bg-body rounded">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nom et prénoms</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Poste</th>
                        <th scope="col">Equipe</th>
                        <th scope="col" style="width: 25%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($listjoueur && count($listjoueur) > 0) : ?>
                        <?php foreach ($listjoueur as $joueur) : ?>
                            <tr>
                                <td><?= $joueur['nomjoueur'] . ' ' . $joueur['prenomjoueur'] ?></td>
                                <td><?= $joueur['contactjoueur'] ?></td>
                                <td><?= $joueur['postejoueur'] ?></td>
                                <td>
                                    <?php
                                    if ($joueur['idequipe']) {
                                        $idequipe = htmlspecialchars(strip_tags($joueur['idequipe']));
                                        $equipe = "SELECT nomequipe FROM Equipe WHERE idequipe = :idequipe";
                                        $stmp = $pdo->prepare($equipe);
                                        $stmp->bindParam(':idequipe', $idequipe);
                                        $stmp->execute();
                                        $author = $stmp->fetchAll();
                                        echo $author[0]['nomequipe'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-secondary" href="./edit.php?id=<?= $joueur['idjoueur'] ?>">
                                        Modifier
                                    </a>
                                    <form action="../back/delete.php" method="post" style="display: inline-block;" class="form2">
                                        <input hidden name="id" type="text" class="form-control" value="<?= $joueur['idjoueur'] ?>">
                                        <button class="btn btn-danger" type="submit">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <th colspan="10" class="text-center">
                                Aucune oeuvre disponible
                            </th>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        let form2 = document.getElementsByClassName('form2');
        console.log(form2);
        for (let i = 0; i < form2.length; i++) {
            const element = form2[i];
            element.addEventListener('submit', (e) => {
                if (!confirm('Voulez-vous supprimer un joueur ?')) {
                    e.preventDefault();
                    return false;
                }
            });
        }
        // form2.addEventListener('submit', (e) => {
        //     if (!confirm('Voulez-vous supprimer une oeuvre ?')) {
        //         e.preventDefault();
        //         return false;
        //     }
        // });
    </script>
</body>

</html>