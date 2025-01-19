<?php
require_once('../connection/connection.php');

// Activer les erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['id_user']) && isset($_POST['role'])) {
    $id_user = $_POST['id_user'];
    $role = $_POST['role'];

    try {
        // Mettre à jour uniquement le rôle de l'utilisateur
        $req = $pdo->prepare("UPDATE utilisateurs SET role = :role WHERE id_user = :id_user");
        $req->bindValue(':role', $role, PDO::PARAM_STR);
        $req->bindValue(':id_user', $id_user, PDO::PARAM_INT);

        if ($req->execute()) {
            
            header("Location: gestion_users.php?success=0");
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
