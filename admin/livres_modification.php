<?php
require_once('../connection/connection.php');

$book = null; 

if (isset($_GET['id_livre'])) {
    $bookId = $_GET['id_livre'];
    $req = $pdo->prepare("SELECT 
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
    WHERE livres.id_livre = :id_livre");
    $req->bindParam(':id_livre', $bookId, PDO::PARAM_INT); 
    $req->execute(); 
    $book = $req->fetch();
}

if ($book === null) { 
    echo "<p>livre non trouvé.</p>";
    exit; 
}

$req3 = $pdo->query("SELECT nom_categorie FROM categories");
$categories = $req3->fetchAll(PDO::FETCH_ASSOC);

$req4 = $pdo->query("SHOW COLUMNS FROM livres LIKE 'disponibilite'");
$column = $req4->fetch(PDO::FETCH_ASSOC);
$availabilityOptions = [];
if ($column) {
    preg_match("/^enum\('(.*)'\)$/", $column['Type'], $matches);
    if (isset($matches[1])) {
        $availabilityOptions = explode("','", $matches[1]);
    }
}

$req2 = $pdo->query("SELECT nom_auteur FROM auteur");
$auteurs = $req2->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un livre</title>
    <link rel="stylesheet" href="../css/insert.css">
</head>
<body>
    <?php include('admin_nav.php'); ?> 
    <main>
        <section>
            <h2>Modifier un livre</h2>
            <form action="modification_livre.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_livre" value="<?php echo htmlspecialchars($book['id_livre']); ?>" readonly>
                <div class="form-group">
                    <label for="titre">Titre du livre:</label>
                    <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($book['titre']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">Image actuelle:</label>
                    <img src="<?php echo htmlspecialchars($book['image']); ?>" alt="Image du livre" style="max-width: 200px; max-height: 200px;">
                </div>
                <div class="form-group">
                    <label for="image">Changer l'image du livre:</label>
                    <input type="file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="auteur">Auteur:</label>
                    <select id="auteur" name="auteur" required>
                        <option value="<?php echo htmlspecialchars($book['nom_auteur']); ?>" selected>
                            <?php echo htmlspecialchars($book['nom_auteur']); ?>
                        </option>
                        <?php foreach ($auteurs as $auteur) : ?>
                        <?php if ($auteur['nom_auteur'] != $book['nom_auteur']) : ?>
                        <option value="<?php echo htmlspecialchars($auteur['nom_auteur']); ?>">
                            <?php echo htmlspecialchars($auteur['nom_auteur']); ?>
                        </option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select> 
                </div>

                <div class="form-group">
                    <label for="categorie">Categorie:</label>
                    <select id="categorie" name="categorie" required>
                        <option value="<?php echo htmlspecialchars($book['nom_categorie']); ?>" selected>
                            <?php echo htmlspecialchars($book['nom_categorie']); ?>
                        </option>
                        <?php foreach ($categories as $categorie) : ?>
                        <?php if ($categorie['nom_categorie'] != $book['nom_categorie']) : ?>
                        <option value="<?php echo htmlspecialchars($categorie['nom_categorie']); ?>">
                            <?php echo htmlspecialchars($categorie['nom_categorie']); ?>
                        </option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="disponibilite">Disponibilité:</label>
                    <select id="disponibilite" name="disponibilite" required>
                        <option value="<?php echo htmlspecialchars($book['disponibilite']); ?>" selected>
                            <?php echo htmlspecialchars($book['disponibilite']); ?>
                        </option>
                        <?php foreach ($availabilityOptions as $option) : ?>
                        <?php if ($option != $book['disponibilite']) : ?>
                        <option value="<?php echo htmlspecialchars($option); ?>">
                            <?php echo htmlspecialchars($option); ?>
                        </option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description_livre">Description:</label>
                    <textarea id="description_livre" name="description_livre" rows="4" required><?php echo htmlspecialchars($book['description_livre']); ?></textarea>
                </div>

                <button type="submit" class="add" onclick="return confirm('Vous confirmez ces modifications ?')">Modifier</button>
            </form>
        </section>
    </main>
</body>
</html>
