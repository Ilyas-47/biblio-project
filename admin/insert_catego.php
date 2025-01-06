<?php
require_once('../connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categorie = $_POST['categorie'];
    $req = $pdo->prepare("INSERT INTO categories (nom_categorie) VALUES (:categorie)");
    $req->bindValue(':categorie', $categorie);
    if ($req->execute()) {
        header("location:gestion_inserts.php");
        exit(); 
    } else {
        echo "Erreur";
    }
} else {
    header("location:gestion_inserts.php");
    exit();
}
?>