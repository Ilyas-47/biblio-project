<?php
require_once('../connection/connection.php');

$books = []; 
$auteurs = []; 

try {
    $req = $pdo->prepare("SELECT * FROM livres LIMIT 4"); 
    $req->execute(); 
    $books = $req->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if (empty($books)) {
    echo "No books found.";
}

try {
    $req = $pdo->prepare("SELECT * FROM auteur LIMIT 4"); 
    $req->execute(); 
    $auteurs = $req->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if (empty($auteurs)) {
    echo "No auteur found.";
}

$searchQuery = ' ';
if ($searchQuery) {
    $req1 = $pdo->prepare("
        SELECT id_livre AS id, titre AS name, image, 'book' AS type 
        FROM livres 
        WHERE titre LIKE :search 
        UNION 
        SELECT id_auteur AS id, nom_auteur AS name, image_auteur AS image, 'author' AS type 
        FROM auteur 
        WHERE nom_auteur LIKE :search
    ");
    $req1->bindValue(':search', '%' . $searchQuery . '%');
    $req1->execute();
    $searchResults = $req1->fetchAll();
}

?>


<!DOCTYPE html>
<html lang="fr">
<?php include('../includes/nav.php')?>
<head>
<head>
    <style>
    .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .card {
        position: relative;
        width: 220px;
        height: 320px;
        background: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card .image {
        width: 100%;
        height: 70%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #f5f5f5;
    }

    .card .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card .info {
        padding: 10px;
        text-align: center;
    }

    .card .info .title {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }

    .card .info .price {
        font-size: 14px;
        color: #00AC7C;
        font-weight: bold;
    }

    .card:hover .info .title {
        color: #00AC7C;
    }
    </style>
</head>
<body>
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="../img/nav.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
              Best selling
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a href="collect.php" class="more-books-link">More books</a>
            </div>
        </div>

<div class="cards" >
        <?php foreach ($books as $book) { ?>
            <a href="book_details.php" <?php $book['id_livre']?>> 
            <div class="card">
                <img class="card_img" src="../images/<?php echo $book['image']; ?>" alt="<?php echo $book['titre']; ?>">
                <p class="tip"><?php echo $book['titre']; ?></p>
            </div>
        <?php } ?>
        </a>
    </div>

    <div class="description">
      <h3>BookBazar - La Marketplace des Livres</h3>
      <p>BookBazar est une plateforme innovante dédiée aux passionnés de lecture, offrant un espace où particuliers et professionnels peuvent acheter, vendre ou échanger des livres neufs et d’occasion. Grâce à une interface intuitive et des fonctionnalités avancées, BookBazar facilite la découverte de nouvelles œuvres littéraires et permet aux utilisateurs de trouver facilement les livres qui correspondent à leurs intérêts. Que vous soyez un étudiant à la recherche de manuels, un collectionneur de 
        livres rares ou un lecteur curieux, BookBazar est la destination idéale pour enrichir votre bibliothèque.</p>
      <img src="../img/books-1617327_1280.jpg" alt="">
    </div>
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Hauteur
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <!-- <a href="" class="more-books-link">More books</a> -->
            </div>
        </div>
    </div>
    <div class="cards" >
        <?php foreach ($auteurs as $auteur) { ?>
            <div class="card">
                <img class="card_img" src="../images/<?php echo $auteur['image_auteur']; ?>" alt="<?php echo $auteur['nom_auteur']; ?>">
                <p class="tip"><?php echo $auteur['nom_auteur']; ?></p>
            </div>
        <?php } ?>
    </div>
</div>
    <?php include('../includes/footer.php')?> 
</body>
</html>
