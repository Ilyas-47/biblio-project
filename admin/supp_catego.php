<?php
include("../connection/connection.php");

if (isset($_GET['idsup'])) {
    $userId = $_GET['idsup'];

    // Prepare the DELETE SQL statement
    $req = $pdo->prepare("DELETE FROM categories  WHERE id_categorie = :idsup");
    $req->bindParam(':idsup', $userId);

    // Execute the statement and check for success
    if ($req->execute()) {
        // Redirect to gestion_users.php after successful deletion
        header("Location: gestion_inserts.php?success=1");
        exit();
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "No user ID provided.";
}
?>
