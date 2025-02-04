<?php 
require_once('../connection/connection.php');

// Supposons que vous avez déjà les informations de l'utilisateur connecté stockées dans une session
session_start();
$user_id = $_SESSION['user_id'];

$req = $pdo->prepare("SELECT * FROM utilisateurs WHERE id_user = :id_user");
$req->bindParam(':id_user', $user_id);
$req->execute();
$user = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .admin-profile {
            background-color: white;
            padding: 60px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            position: relative; /* Allows absolute positioning of buttons */
        }
        .admin-profile img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid teal;
            margin-bottom: 20px;
        }
        .admin-profile h2 {
            margin-bottom: 15px;
            color: teal;
        }
        .admin-profile p {
            margin-bottom: 15px;
        }
        .admin-profile .role {
            font-weight: bold;
            color: teal;
        }
        .admin-profile .creation-date {
            color: gray;
            font-size: 14px;
        }
        .admin-profile .back-button,
        .admin-profile .logout-button {
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            bottom: 20px; /* Adjusted for both buttons */
        }
        .admin-profile .back-button {
            background-color: teal;
            left: 20px; /* Positioned within the card */
        }
        .admin-profile .logout-button {
            background-color: #ff2424;
            right: 20px; /* Positioned within the card */
        }
        .admin-profile .back-button:hover {
            background-color: darkslategray;
        }
        .admin-profile .logout-button:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="admin-profile">
        <img src="<?php echo htmlspecialchars($user['image_prfl']); ?>" alt="Photo de profil">
        <h2><?php echo htmlspecialchars($user['nom']); ?></h2>
        <p class="role">
            <?php 
            if ($user['role'] == 'admin') {
                echo "Administrateur";
            } else {
                echo "Chef Administratif";
            }
            ?>
        </p>
        <p class="description">
            <?php 
            if ($user['role'] == 'admin') {
                echo "L'administrateur est chargé de gérer les emprunts, l'inventaire des livres, les informations des auteurs et l'organisation des catégories pour faciliter la recherche et le classement.";
            } else {
                echo "Le chef administratif supervise la gestion des emprunts, des livres, des auteurs et des catégories, tout en gérant les utilisateurs, leurs profils et droits d'accès, et en coordonnant l'équipe administrative.";
            }
            ?>
        </p>
        <p class="creation-date">Compte créé le: <?php echo htmlspecialchars($user['date_inscription']); ?></p>
        <button class="back-button" onclick="window.location.href='gestion_livres.php'">Retour</button>
        <button class="logout-button" onclick="window.location.href='deconnect.php'">Déconnexion</button>
    </div>
</body>
</html>
