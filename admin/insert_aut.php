<?php
require_once('../connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auteur = $_POST['auteur'];
    $description = $_POST['description'];
    $req1 = $pdo->prepare("INSERT INTO auteur (nom_auteur) VALUES (:auteur)");
    $req2 = $pdo->prepare("INSERT INTO auteur (description) VALUES (:description)");
    $req1->bindValue(':auteur', $auteur);
    $req2->bindValue(':description', $description);
    if ($req1->execute() && $req2->execute()) {
        header("location:gestion_inserts.php");
        exit(); 
        echo "Erreur lors de l'ajout de l'auteur : ";
    }
} else {
    header("location:gestion_inserts.php");
    exit();
}
?>