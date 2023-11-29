<?php
include '../configuration/connexion.inc.php';

// isset($_POST['id']) cet id est un champ id du fichier edit; je le récupère pour la requête
if (isset($_POST['id'])) {
    if (!empty($_POST['id'])) {
        $id = htmlspecialchars(strip_tags($_POST['id']));

        $deleteOeuvreRequest = "DELETE FROM Joueur
            WHERE idjoueur = :id;
        ";
        $smtp = $pdo->prepare($deleteOeuvreRequest);
        $smtp->bindParam(':id', $id);
        $smtp->execute();

        header("location: ../views/menu.php");
    }
} else {
    var_dump("L'id n'est pas défini");
}
