<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .ml-2 {
            margin-left: 8px;
        }

        .admin-name {
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <nav class="sidebar">
            <div class="logo">
                <i class="fas fa-book"></i> BookBazaar
            </div>
            <ul>
            <?php
                session_start();

                $user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : '';

                if ($user_role == 'chef administratif') {
                    echo '<li><a href="gestion_users.php"> Gestion des utilisateurs</a></li>';
                    echo '<li><a href="inserts.php"> Insertion</a></li>';
                }
                ?>
                <!-- <li><a href="gestion_users.php"> Gestion des utilisateurs</a></li> -->
                <li><a href="gestion_emprunts.php"> Gestion des Emprunts</a></li>
                <li><a href="gestion_livres.php"></i> Gestion des Livres</a></li>
                <li><a href="gestion_inserts.php">Auteur/Catégorie</a></li>
                <!-- <li><a href="inserts.php"></i> Insertion</a></li> -->
            </ul> 
            <div class="profile">
            <?php
               if (isset($_SESSION['user_email'])) {
                   $admin_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Admin';
                   echo '<a href="admin_prfl.php" class="d-flex align-items-center"><span class="admin-name ml-2">' . htmlspecialchars($admin_name) . '</span></a>';

               } else {
                   echo '<a class="btn btn-primary ml-auto small-btn" href="login.php">Admin</a>';
               }
              ?>

            </div>
        </nav>
    </header>
    <main>
