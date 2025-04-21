<?php
include("../connection/connection.php");

if (isset($_GET['idsup'])) {
    $userId = $_GET['idsup'];

    $req = $pdo->prepare("DELETE FROM categories  WHERE id_categorie = :idsup");
    $req->bindParam(':idsup', $userId);

    if ($req->execute()) {
        header("Location: gestion_inserts.php?success=1");
        exit();
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "No user ID provided.";
}
?>
