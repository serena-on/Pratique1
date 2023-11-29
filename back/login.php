<?php
include '../configuration/connexion.inc.php';

if (isset($_POST['iduser']) && isset($_POST['mdp'])) {
    if (!empty($_POST['iduser']) && !empty($_POST['mdp'])) {
        $iduser = htmlspecialchars(strip_tags($_POST['iduser']));
        $mdp = htmlspecialchars(strip_tags($_POST['mdp']));


        $connexionRequest = "SELECT * FROM Utilisateur WHERE iduser = :iduser AND mdp = :mdp";
        $smtp = $pdo->prepare($connexionRequest);
        $smtp->bindParam(':iduser', $iduser);
        $smtp->bindParam(':mdp', $mdp);
        $smtp->execute();
        // var_dump(count($smtp->fetchAll()) == 0);
        if (count($smtp->fetchAll()) == 0) {
            $error = "
                Identifiant incorrecte
            ";
            header("location: ../views/index.php?error=" . urlencode($error));
            // header("location: ../views/index.php");
        } else {
            header("location: ../views/menu.php");
        }
    }
}
