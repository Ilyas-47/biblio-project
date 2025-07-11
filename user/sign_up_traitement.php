<?php
session_start();
require_once('../connection/connection.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['mot_de_passe'];
        $default_role = 'utilisateur'; 
        $default_image_url = '../images/user.png'; 

        if (empty($full_name) || empty($email) || empty($password)) {
            header("Location: sign_up.php");
            exit();
        }

        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ? LIMIT 1");
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['signup_error'] = "Le compte deja execiter.";
            header("Location: sign_up.php");
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe, role, image_prfl) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $full_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $password, PDO::PARAM_STR); 
        $stmt->bindParam(4, $default_role, PDO::PARAM_STR);
        $stmt->bindParam(5, $default_image_url, PDO::PARAM_STR);
        $stmt->execute();
        header("Location: login.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
