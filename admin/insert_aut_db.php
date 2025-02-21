<?php
require_once('../connection/connection.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['auteur']) && isset($_FILES['image']) && isset($_POST['description'])) {
        $auteur = htmlspecialchars($_POST['auteur']);
        $description = htmlspecialchars($_POST['description']);

        $image = $_FILES['image']['name'];
        $imagePath = '../images/' . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            try {
                $req = $pdo->prepare("INSERT INTO auteur (nom_auteur, image_auteur, description) VALUES (:auteur, :image, :description)");

                $req->bindValue(':auteur', $auteur);
                $req->bindValue(':image', $imagePath);
                $req->bindValue(':description', $description);
                
                if ($req->execute()) {
                    header("Location: gestion_inserts.php?message=success");
                    exit();
                } else {
                    die("Erreur lors de l'ajout de l'auteur : " . var_export($req->errorInfo(), true));
                }
            } catch (PDOException $e) {
                die("Erreur SQL : " . $e->getMessage());
            }
        } else {
            die("Erreur lors du téléversement de l'image.");
        }
    } else {
        echo "Missing required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
