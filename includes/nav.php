<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBazaar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/style.css">    

</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo et Nom -->
            <a class="navbar-brand mx-auto" href="acc.php">
                <i class="fas fa-book"></i> BookBazaar
            </a>
            <!-- Bouton pour le menu mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Menu -->
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
        <a class="dropdown-item" href="#">Catégorie 1</a>
        <a class="dropdown-item" href="#">Catégorie 2</a>
        <a class="dropdown-item" href="#">Catégorie 3</a>
    </div>
</li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav" href="contact.php">Contactez-nous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav" href="about.php">FAQ</a>
                    </li>
                </ul>
                <!-- Bouton Login -->
                <div class="d-flex">
                    <a class="btn btn-primary ml-auto" href="sign_up.php">S'inscrire</a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>
