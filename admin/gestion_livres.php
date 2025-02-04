<?php
require_once('../connection/connection.php');

$searchQuery = '';
if (isset($_GET['search'])) {
    $searchQuery = htmlspecialchars($_GET['search']);
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 15;
$offset = ($page - 1) * $limit;

$sql = "
    SELECT 
        livres.*, 
        auteur.nom_auteur, 
        categories.nom_categorie 
    FROM 
        livres 
    JOIN 
        auteur 
    ON 
        livres.id_auteur = auteur.id_auteur 
    JOIN 
        categories 
    ON 
        livres.id_categorie = categories.id_categorie
";

if ($searchQuery) {
    $sql .= " WHERE livres.titre LIKE :search";
}

$sql .= " LIMIT :limit OFFSET :offset";

$req1 = $pdo->prepare($sql);

if ($searchQuery) {
    $req1->bindValue(':search', '%' . $searchQuery . '%', PDO::PARAM_STR);
}

$req1->bindValue(':limit', $limit, PDO::PARAM_INT);
$req1->bindValue(':offset', $offset, PDO::PARAM_INT);

$req1->execute();
$books = $req1->fetchAll(PDO::FETCH_ASSOC);

$countSql = "
    SELECT 
        COUNT(*) as total
    FROM 
        livres 
    JOIN 
        auteur 
    ON 
        livres.id_auteur = auteur.id_auteur 
    JOIN 
        categories 
    ON 
        livres.id_categorie = categories.id_categorie
";

if ($searchQuery) {
    $countSql .= " WHERE livres.titre LIKE :search";
}

$countReq = $pdo->prepare($countSql);

if ($searchQuery) {
    $countReq->bindValue(':search', '%' . $searchQuery . '%', PDO::PARAM_STR);
}

$countReq->execute();
$count = $countReq->fetch(PDO::FETCH_ASSOC);

$totalPages = ceil($count['total'] / $limit);

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script>alert('Livre supprimé avec succès!');</script>";
} elseif (isset($_GET['success']) && $_GET['success'] == 0) {
    echo "<script>alert('Livre modifié avec succès!');</script>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php') ?> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Livres</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
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
    <section id="livres">
        <h2>Gestion des Livres</h2>
        <form method="GET" action="">
            <div class="search-bar">
                <input type="text" name="search" placeholder="Rechercher un livre..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                <button type="submit">Rechercher</button>
            </div>
        </form>
        <a class="add" href="insert_livres.php">Ajouter le livre</a>
        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Categorie</th>
                    <th>Disponibilité</th>
                    <th>Date de l'ajout</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1 + ($page - 1) * $limit;
                foreach($books as $book){
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$book['titre'].'</td>';
                    echo '<td>'.$book['nom_auteur'].'</td>';
                    echo '<td>'.$book['nom_categorie'].'</td>';
                    echo '<td>'.$book['disponibilite'].'</td>';
                    echo '<td>'.$book['date_ajout'].'</td>';
                    echo '<td>
                          <a href="livres_modification.php?id_livre=' . urlencode($book['id_livre']) . '" class="edit">Modifier</a> 
                          <a href="supp_livre.php?id='. urlencode($book['id_livre']) . '" class="delete" onclick="if(confirm(\'Êtes-vous sûr de vouloir supprimer ce livre ?\')){return true;}else{event.preventDefault();}">Supprimer</a>
                          </td>';
                    echo '</tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($searchQuery); ?>">Précédent</a>
            <?php else: ?>
                <span>Précédent</span>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($searchQuery); ?>" class="<?php if($i == $page) echo 'active'; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
            
            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($searchQuery); ?>">Suivant</a>
            <?php else: ?>
                <span>Suivant</span>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
