<?php
include("../connection/connection.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Prepare the DELETE SQL statement
    $req = $pdo->prepare("DELETE FROM utilisateurs WHERE id_user = :id_user");
    $req->bindParam(':id_user', $userId);

    // Execute the statement and check for success
    if ($req->execute()) {
        // Redirect to gestion_users.php after successful deletion
        header("Location: gestion_users.php?success=1");
        exit();
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "No user ID provided.";
}
?>
