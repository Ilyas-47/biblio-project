

<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php')?>
<link rel="stylesheet" href="../css/insert.css"> 
    <main>
        <section>
            <h2>Ajouter une categorie</h2>
            <form action="insert_catego.php" method="POST">
                <div class="form-group">
                    <label for="categorie">Nom categorie:</label>
                    <input type="text" id="categorie" name="categorie" required>
                </div>
                <button type="submit" class="add">Ajouter la categorie</button>
            </form>
        </section>
     <section>
        <h2>Ajouter un auteur</h2>
            <form action="insert_aut.php" method="POST">
                <div class="form-group">
                    <label for="auteur">Nom d'auteur:</label>
                    <input type="text" id="auteur" name="auteur" required>
                </div>

                <div class="form-group">
                    <label for="description">description:</label>
                    <textarea id="description" name="description" rows="4" maxlength="123" required></textarea>
                </div>

                <button type="submit" class="add">Ajouter l'auteur</button>
            </form>
</section>
    </main>
</body>
</html>