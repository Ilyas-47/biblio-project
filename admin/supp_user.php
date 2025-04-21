<?php
include("../connection/connection.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $req = $pdo->prepare("DELETE FROM utilisateurs WHERE id_user = :id_user");
    $req->bindParam(':id_user', $userId);

    if ($req->execute()) {
        header("Location: gestion_users.php?success=1");
        exit();
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "No user ID provided.";
}
?>
