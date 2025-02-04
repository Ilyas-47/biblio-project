<?php
include("../connection/connection.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $req = $pdo->prepare("DELETE FROM livres  WHERE id_livre = :id");
    $req->bindParam(':id', $userId);

    if ($req->execute()) {
        header("Location: gestion_livres.php?success=1");
        exit();
    } else {
        echo "Error deleting book.";
    }
} else {
    echo "No user ID provided.";
}
?>
