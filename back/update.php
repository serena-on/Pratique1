<?php

include '../configuration/connexion.inc.php';

if (isset($_POST['nomJoueur']) && isset($_POST['prenomJoueur']) && isset($_POST['contactJoueur']) && isset($_POST['posteJoueur']) && isset($_POST['idEquipe'])) {
    if (!empty($_POST['nomJoueur']) && !empty($_POST['prenomJoueur']) && !empty($_POST['contactJoueur']) && isset($_POST['posteJoueur']) && !empty($_POST['idEquipe'])) {
        $id = htmlspecialchars(strip_tags($_POST['id']));
        $nomJoueur = htmlspecialchars(strip_tags($_POST['nomJoueur']));
        $prenomJoueur = htmlspecialchars(strip_tags($_POST['prenomJoueur']));
        $contactJoueur = htmlspecialchars(strip_tags($_POST['contactJoueur']));
        $posteJoueur = htmlspecialchars(strip_tags($_POST['posteJoueur']));
        $idEquipe = htmlspecialchars(strip_tags($_POST['idEquipe']));

        $updateJoueurRequest = "UPDATE Joueur SET 
            nomjoueur = :nomJoueur, 
            prenomjoueur = :prenomJoueur,
            contactjoueur = :contactJoueur,
            postejoueur = :posteJoueur,
            idequipe = :idEquipe
            WHERE idjoueur = :id;
        ";
        $smtp = $pdo->prepare($updateJoueurRequest);
        $smtp->bindParam(':nomJoueur', $nomJoueur);
        $smtp->bindParam(':prenomJoueur', $prenomJoueur);
        $smtp->bindParam(':contactJoueur', $contactJoueur);
        $smtp->bindParam(':posteJoueur', $posteJoueur);
        $smtp->bindParam(':idEquipe', $idEquipe);
        $smtp->bindParam(':id', $id);
        $smtp->execute();

        header("location: ../views/menu.php");
    } else {
        var_dump('champ vide');
    }
} else {
    var_dump('champ non défini');
}
