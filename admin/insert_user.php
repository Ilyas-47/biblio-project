<?php
 require_once('../connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'];
    $req = $pdo->prepare("INSERT INTO utilisateurs (nom, email,mot_de_passe,role) VALUES (:nom, :email,:mot_de_passe,:role)");
    $req->bindValue(':nom', $nom);
    $req->bindValue(':email', $email);
    $req->bindValue(':mot_de_passe', $mot_de_passe);
    $req->bindValue(':role', $role); 

    try {
        if ($req->execute()) {
            header("location:insert_users.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'auteur : ";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'auteur : " . $e->getMessage();
    }
} else {
    header("location:insert_users.php");
    exit();
}
?>