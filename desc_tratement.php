<?php
 require_once('connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $desc = $_POST['desc'];
    $req = $pdo->prepare("INSERT INTO  description_admin (description_ad) VALUES (:desc)");
    $req->bindValue(':desc', $desc);
    try {
        if ($req->execute()) {
            echo "sucess : ";
                        exit();
        } else {
            echo "Erreur  ";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} 
?>