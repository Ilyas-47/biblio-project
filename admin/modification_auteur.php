<?php
require_once('../connection/connection.php');

if (isset($_POST['id_auteur'], $_POST['nom_auteur'], $_POST['description'])) {
    $id_auteur = $_POST['id_auteur'];
    $nom_auteur = $_POST['nom_auteur'];
    $description = $_POST['description'];

    try {
        $req = $pdo->prepare("UPDATE auteur SET nom_auteur = :nom_auteur, description = :description WHERE id_auteur = :id_auteur");
        $req->bindParam(':id_auteur', $id_auteur);
        $req->bindParam(':nom_auteur', $nom_auteur);
        $req->bindParam(':description', $description);
        $req->execute();
        
        if ($req->rowCount() > 0) {
            header("Location: gestion_inserts.php?success=2");
            exit;        } 
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Erreur : les paramètres sont manquants";
}
?>
