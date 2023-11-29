<?php
include '../configuration/connexion.inc.php';

if (isset($_POST['nomJoueur']) && isset($_POST['prenomJoueur']) && isset($_POST['contactJoueur']) && isset($_POST['posteJoueur']) && isset($_POST['idEquipe'])) {
    if (!empty($_POST['nomJoueur']) && !empty($_POST['prenomJoueur']) && !empty($_POST['contactJoueur']) && isset($_POST['posteJoueur']) && !empty($_POST['idEquipe'])) {
        $nomJoueur = htmlspecialchars(strip_tags($_POST['nomJoueur']));
        $prenomJoueur = htmlspecialchars(strip_tags($_POST['prenomJoueur']));
        $contactJoueur = htmlspecialchars(strip_tags($_POST['contactJoueur']));
        $posteJoueur = htmlspecialchars(strip_tags($_POST['posteJoueur']));
        $idEquipe = htmlspecialchars(strip_tags($_POST['idEquipe']));

        $createJoueurRequest = "INSERT INTO Joueur (nomjoueur, prenomjoueur, contactjoueur, postejoueur, idequipe) VALUES (:nomJoueur, :prenomJoueur, :contactJoueur, :posteJoueur, :idEquipe)";

        $smtp = $pdo->prepare($createJoueurRequest);
        $smtp->bindParam(':nomJoueur', $nomJoueur);
        $smtp->bindParam(':nomJoueur', $nomJoueur);
        $smtp->bindParam(':prenomJoueur', $prenomJoueur);
        $smtp->bindParam(':contactJoueur', $contactJoueur);
        $smtp->bindParam(':posteJoueur', $posteJoueur);
        $smtp->bindParam(':idEquipe', $idEquipe);
        $smtp->execute();

        header("location: ../views/menu.php");
    } else {
        // handle empty fields
    }
}
