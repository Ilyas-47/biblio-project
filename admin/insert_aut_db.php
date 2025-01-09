<?php
 require_once('../connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auteur = $_POST['auteur'];
    $description = $_POST['description'];
    $req = $pdo->prepare("INSERT INTO auteur (nom_auteur, description) VALUES (:auteur, :description)");
    $req->bindValue(':auteur', $auteur);
    $req->bindValue(':description', $description);
    try {
        if ($req->execute()) {
            header("location:gestion_inserts.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'auteur : ";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'auteur : " . $e->getMessage();
    }
} else {
    header("location:gestion_inserts.php");
    exit();
}
?>