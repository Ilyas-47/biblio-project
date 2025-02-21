<?php
require_once('../connection/connection.php');
session_start();

try {
    $req = $pdo->prepare("SELECT * FROM categories");
    $categories=$req;
    $categories->execute();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBazaar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <link rel="stylesheet" href="../css/style.css">    
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

    .user-name {
        font-weight: normal;    
        color: black;
    }

    </style>
</head>
<body>
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="acc.php">
                <i class="fas fa-book"></i> BookBazaar
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link active" id="nav" aria-current="page" href="acc.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav" href="collect.php">Nos Collections</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="nav" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($categories as $categorie) { ?>
    <a class="dropdown-item" href="collect.php?id_categorie=<?php echo $categorie['id_categorie'] ?>"><?php echo $categorie['nom_categorie'] ?></a>
                            <?php } ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav" href="contact.php">Contactez-nous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav" href="about.php">FAQ</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
    <?php
    if (isset($_SESSION['user_email'])) {
        $user_image = isset($_SESSION['user_image']) ? $_SESSION['user_image'] : '../images/user.jpg';
        $user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'User';
        echo '<a href="profile.php" class="d-flex align-items-center"><img src="' . $user_image . '" alt="Profile" class="profile-img"><span class="user-name ml-2">' . htmlspecialchars($user_name) . '</span></a>';
    } else {
        echo '<a class="btn btn-primary ml-auto small-btn" href="sign_up.php">S\'inscrire</a>';
    }
    ?>
</div>



                </div>

            </div>
        </div>
    </nav>
</body>
</html>
