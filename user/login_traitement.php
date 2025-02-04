<?php
session_start();
require_once('../connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier les champs vides
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Tous les champs sont requis.";
        header("Location: login.php");
        exit();
    }

    // Préparer la requête SQL pour éviter les injections SQL
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ? LIMIT 1");
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password == $user['mot_de_passe']) { // Comparaison directe sans hachage
        // Stocker les informations de l'utilisateur dans la session
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['user_name'] = $user['nom']; // Ajouter le nom de l'utilisateur
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role']; // Supposons que le rôle est stocké dans le champ 'role'
        $_SESSION['user_image'] = $user['image_prfl']; // Stocker l'image de profil de l'utilisateur

        // Rediriger en fonction du rôle de l'utilisateur
        if ($user['role'] == 'admin' || $user['role'] == 'chef administratif') {
            header("Location: ../admin/gestion_livres.php");
        } else if ($user['role'] == 'utilisateur') {
            header("Location: acc.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Adresse email ou mot de passe incorrect.";
        header("Location: login.php"); // Rediriger vers le formulaire de login
        exit();
    }
}
?>
