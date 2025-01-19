<?php
require_once('../connection/connection.php');

// Activer les erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['id_auteur']) && isset($_POST['nom_auteur']) && isset($_POST['description'])) {
    $id_auteur = $_POST['id_auteur'];
    $nom_auteur = $_POST['nom_auteur'];
    $description = $_POST['description'];

    try {
        // Mettre à jour uniquement le rôle de l'utilisateur
        $req = $pdo->prepare("UPDATE auteur SET nom_auteur = :nom_auteur, description = :description WHERE id_auteur = :id_auteur");        
        $req->bindValue(':nom_auteur', $nom_auteur, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':id_auteur', $id_auteur, PDO::PARAM_INT);

        if ($req->execute()) {
            
            header("Location: gestion_inserts.php?success=2");
            exit;
        } else {
            echo "Erreur lors de la mise à jour : " . implode(", ", $req->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    }
} else {
    echo "Données manquantes. Veuillez vérifier le formulaire.";
}
