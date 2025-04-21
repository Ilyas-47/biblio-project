<?php
require_once('../connection/connection.php');

if (isset($_POST['id_auteur'], $_POST['nom_auteur'], $_POST['description'])) {
    $id_auteur = $_POST['id_auteur'];
    $nom_auteur = $_POST['nom_auteur'];
    $description = $_POST['description'];
    
    try {
        if (!empty($_FILES['image_auteur']['name'])) {
            $image_name = time() . '_' . basename($_FILES['image_auteur']['name']);
            $image_path = '../images/' . $image_name; 

            if (move_uploaded_file($_FILES['image_auteur']['tmp_name'], $image_path)) {
                $req = $pdo->prepare("UPDATE auteur SET nom_auteur = :nom_auteur, description = :description, image_auteur = :image WHERE id_auteur = :id_auteur");
                $req->bindParam(':image', $image_name);
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                exit;
            }
        } else {
            $req = $pdo->prepare("UPDATE auteur SET nom_auteur = :nom_auteur, description = :description WHERE id_auteur = :id_auteur");
        }

        $req->bindParam(':id_auteur', $id_auteur);
        $req->bindParam(':nom_auteur', $nom_auteur);
        $req->bindParam(':description', $description);
        $req->execute();

        if ($req->rowCount() > 0) {
            header("Location: gestion_inserts.php?success=2");
            exit;
        } else {
            echo "Aucune modification effectuée.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Erreur : les paramètres sont manquants.";
}
?>
