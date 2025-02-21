<?php
require_once('../connection/connection.php');

$booksPerPage = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $booksPerPage;

$id_categorie = isset($_GET['id_categorie']) ? intval($_GET['id_categorie']) : 0;

try {
    if ($id_categorie) {
        $req = $pdo->prepare("SELECT COUNT(*) FROM livres WHERE id_categorie = :id_categorie");
        $req->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
    } else {
        $req = $pdo->prepare("SELECT COUNT(*) FROM livres");
    }
    $req->execute();
    $totalBooks = $req->fetchColumn();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$totalPages = ceil($totalBooks / $booksPerPage);

try {
    if ($id_categorie) {
        $req = $pdo->prepare("SELECT * FROM livres WHERE id_categorie = :id_categorie LIMIT :start, :booksPerPage");
        $req->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
    } else {
        $req = $pdo->prepare("SELECT * FROM livres LIMIT :start, :booksPerPage");
    }
    $req->bindValue(':start', $start, PDO::PARAM_INT);
    $req->bindValue(':booksPerPage', $booksPerPage, PDO::PARAM_INT);
    $req->execute();
    $books = $req->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if (empty($books)) {
    echo "No books found.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            flex: 1 0 21%;
            box-sizing: border-box;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a, .pagination span {
            margin: 0 5px;
            padding: 8px 16px;
            background-color: teal;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .pagination a.active, .pagination span.active {
            background-color: darkslategray;
        }
        .pagination a:hover {
            background-color: darkslategray;
        }
    </style>
</head>
<body>
  <?php include('../includes/nav.php')?>
    <div class="tm-hero d-flex justify-content-center align-items-center" id="tm-video-container">
        <video autoplay muted loop id="tm-video">
            <source src="../video/140807-776043760_small.mp4" type="video/mp4">
        </video>  
        <i id="tm-video-control-button" class="fas fa-pause"></i>
        <form class="d-flex position-absolute tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">All books</h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="<?php echo $page; ?>" size="1" class="tm-input-paging tm-text-primary"> of <?php echo $totalPages; ?>
                </form>
            </div>
        </div>
        <div class="cards">
        <?php foreach ($books as $book) { ?>
            <a href="book_details.php?id=<?php echo $book['id_livre']; ?>"> 
                <div class="card">
                    <img class="card_img" src="../images/<?php echo $book['image']; ?>" alt="<?php echo $book['titre']; ?>">
                    <p class="tip"><?php echo $book['titre']; ?></p>
                </div>
            </a>
        <?php } ?>
        </div>
        <div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>">Précédent</a>
    <?php else: ?>
        <span>Précédent</span>
    <?php endif; ?>
    
    <?php for ($i = max(1, $page - 1); $i <= min($totalPages, $page + 1); $i++): ?>
        <a href="?page=<?php echo $i; ?>" class="<?php if($i == $page) echo 'active'; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
    
    <?php if ($page < $totalPages): ?>
        <a href="?page=<?php echo $page + 1; ?>">Suivant</a>
    <?php else: ?>
        <span>Suivant</span>
    <?php endif; ?>
</div>
    <br>
    <br>
    <br>

    <?php include('../includes/footer.php')?>
    <script src="../js/plugins.js"></script>
</body>
</html>
