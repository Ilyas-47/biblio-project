<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php')?>
<link rel="stylesheet" href="../css/insert.css"> <!-- Lien vers votre fichier CSS -->

    <main>
        <section>
            <h2>Ajouter une categorie</h2>
            <form action="ajouter_livre.php" method="POST">
                <div class="form-group">
                    <label for="titre">Nom categorie:</label>
                    <input type="text" id="titre" name="titre" required>
                </div>
                <button type="submit" class="add">Ajouter la categorie</button>
            </form>
        </section>
     <section>
        <h2>Ajouter un auteur</h2>
            <form action="ajouter_livre.php" method="POST">
                <div class="form-group">
                    <label for="titre">Nom d'auteur:</label>
                    <input type="text" id="titre" name="titre" required>
                </div>

                <div class="form-group">
                    <label for="description">description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>

                <button type="submit" class="add">Ajouter l'auteur</button>
            </form>
</section>
    </main>
</body>
</html>