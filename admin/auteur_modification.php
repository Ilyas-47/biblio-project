<?php
require_once('../connection/connection.php');

$user = null; // Initialisation de la variable

if (isset($_GET['id_auteur'])) {
    $userId = $_GET['id_auteur'];
    $req = $pdo->prepare("SELECT * FROM auteur WHERE id_auteur = :id_auteur");
    $req->bindParam(':id_auteur', $userId, PDO::PARAM_INT); // Liaison du paramètre
    $req->execute(); 
    $user = $req->fetch();
}

if ($user === null) { // Vérifier si l'auteur n'est pas trouvé
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
            <form action="modification_auteur.php" method="POST">
                <input type="hidden" name="id_auteur" value="<?php echo htmlspecialchars($user['id_auteur'])?>" readonly>
                <div class="form-group">
                    <label for="titre">Auteur:</label>
                    <input type="text" id="titre" name="nom_auteur" value="<?php echo htmlspecialchars($user['nom_auteur'])?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($user['description'])?></textarea>
                </div>

                <button type="submit" class="add" onclick="return confirm('Vous confirmez ces modifications ?')">Modifier</button>
            </form>
        </section>
    </main>
</body>
</html>
