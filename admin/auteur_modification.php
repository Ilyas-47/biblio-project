<?php
require_once('../connection/connection.php');

// Retrieve user data based on ID
$userId = $_GET['id_auteur'];
$req = $pdo->prepare("SELECT * FROM auteur WHERE id_auteur = :id_auteur");
$req->execute(['id_auteur' => $userId]); 
$userData = $req->fetch();

if ($userData === false) {
    echo "<p>Auteur non trouvé.</p>";
    exit; // Stop further execution if no data is found
}
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un auteur</title>
    <link rel="stylesheet" href="../css/insert.css"> 
<body>
    <?php include('admin_nav.php'); ?> 
    <main>
        <section>
            <h2>Modifier un auteur</h2>
            <form action="modification_auteur.php" method="POST">
            <input type="hidden"  name="id_auteur" value="<?php echo htmlspecialchars($userData['id_auteur'])?>" readonly>
                <div class="form-group">
                    <label for="titre">auteur:</label>
                    <input type="text" id="titre" name="nom_auteur" value="<?php echo $userData['nom_auteur']?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required><?php echo $userData['description']?></textarea>
                </div>

                <button type="submit" class="add" onclick="return confirm('Vous confirmez ces modification ?')">Modifier</button>
            </form>
        </section>
    </main>
</body>
</html>
