<?php
require_once('../connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'];
    $default_image_url = '../images/user.png'; // Chemin de l'image par défaut

    // Vérifier si une image est fournie
    $image_prfl = !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : $default_image_url;

    $req = $pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe, role, image_prfl) VALUES (:nom, :email, :mot_de_passe, :role, :image_prfl)");
    $req->bindValue(':nom', $nom);
    $req->bindValue(':email', $email);
    $req->bindValue(':mot_de_passe', $mot_de_passe);
    $req->bindValue(':role', $role);
    $req->bindValue(':image_prfl', $image_prfl);

    try {
        if ($req->execute()) {
            header("location:insert_users.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'utilisateur : ";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
    }
} else {
    header("location:insert_users.php");
    exit();
}
?>
