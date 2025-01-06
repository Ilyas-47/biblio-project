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
            <form action="ajouter_livre.php" method="POST">
                <div class="form-group">
                    <label for="titre">auteur:</label>
                    <input type="text" id="titre" name="titre" required>
                </div>

                <div class="form-group">
                    <label for="Description">Description:</label>
                    <textarea id="Description" name="Description" rows="4" required></textarea>
                </div>

                <button type="submit" class="add" onclick="return confirm('Vous confirmez ces modification ?')">Modifier</button>
            </form>
        </section>
    </main>
</body>
</html>