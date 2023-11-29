<?php

$error = "";

if (isset($_GET['error'])) {
    $error = htmlspecialchars($_GET['error']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <script src="../css/bootstrap/js/bootstrap.js"></script>
    <title>Connexion</title>
</head>

<body>
    <!-- <div class="container d-none" id="errorDiv">
        <div class="alert alert-danger alert-block d-flex justify-content-between">
            <ul class="list-unstyled">
                <li id="errorList"><?= $error  ?></li>
            </ul>
            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
        </div>
    </div> -->

    <div class="container mt-5">
        <div class="col-md-12 shadow p-3 bg-body rounded">
            <div class="card">
                <div class="card-header">
                    <h5>Connexion</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="../back/login.php" id="connexion">
                        <div class="col-md-12">
                            <div class="mb-2 col">
                                <div>
                                    <label for="iduser" class="col-md-3 col-form-label">ID</label>
                                </div>

                                <div class="col">
                                    <input id="iduser" name="iduser" type="text" class="form-control" autofocus>
                                </div>
                                <!-- <span class="help-block text-danger" id="idError"></span> -->
                            </div>
                            <div class="mb-2 col">
                                <div>
                                    <label for="mdp" class="col-md-3 col-form-label">Mot de passe</label>
                                </div>

                                <div class="col">
                                    <input id="mdp" name="mdp" type="password" class="form-control">
                                </div>
                                <!-- <span class="help-block text-danger" id="mdpError"></span> -->
                            </div>


                        </div>

                        <input type="submit" class="btn btn-primary mt-4" value="Enregistrer">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/validationConnexion.js"></script>
</body>

</html>