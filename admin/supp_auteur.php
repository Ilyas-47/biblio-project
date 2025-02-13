<?php
include("../connection/connection.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $req = $pdo->prepare("DELETE FROM auteur  WHERE id_auteur = :id");
    $req->bindParam(':id', $userId);

    if ($req->execute()) {
        header("Location: gestion_inserts.php?success=0");
        exit();
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "No user ID provided.";
}
?>
