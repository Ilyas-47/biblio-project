<?php
include("../connection/connection.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Prepare the DELETE SQL statement
    $req = $pdo->prepare("DELETE FROM auteur  WHERE id_auteur = :id");
    $req->bindParam(':id', $userId);

    // Execute the statement and check for success
    if ($req->execute()) {
        // Redirect to gestion_users.php after successful deletion
        header("Location: gestion_inserts.php?success=0");
        exit();
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "No user ID provided.";
}
?>
