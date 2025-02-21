<?php
require_once('../connection/connection.php');

$user = null; 

if (isset($_GET['id_auteur'])) {
    $userId = $_GET['id_auteur'];
    $req = $pdo->prepare("SELECT * FROM auteur WHERE id_auteur = :id_auteur");
    $req->bindParam(':id_auteur', $userId, PDO::PARAM_INT); 
    $req->execute(); 
    $user = $req->fetch();
}

if ($user === null) { 
    echo "<p>Auteur non trouvé.</p>";
    exit; 
}
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un auteur</title>
    <link rel="stylesheet" href="../css/insert.css"> 
</head>
<body>
    <?php include('admin_nav.php'); ?> 
    <main>
        <section>
            <h2>Modifier un auteur</h2>
            <form action="modification_auteur.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_auteur" value="<?php echo htmlspecialchars($user['id_auteur']) ?>" readonly>
                
                <div class="form-group">
                    <label for="titre">Auteur:</label>
                    <input type="text" id="titre" name="nom_auteur" value="<?php echo htmlspecialchars($user['nom_auteur']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="image">Image actuelle:</label>
                    <?php if (!empty($user['image_auteur'])): ?>
                        <img src="<?php echo '../images/' . htmlspecialchars($user['image_auteur']); ?>" 
                             alt="Image d'auteur" style="max-width: 200px; max-height: 200px;">
                    <?php else: ?>
                        <p>Aucune image disponible</p>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="image_auteur">Changer l'image d'auteur:</label>
                    <input type="file" id="image_auteur" name="image_auteur">
                </div>
                
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($user['description']) ?></textarea>
                </div>

                <button type="submit" class="add" onclick="return confirm('Vous confirmez ces modifications ?')">Modifier</button>
            </form>
        </section>
    </main>
</body>
</html>
