<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php')?>
<link rel="stylesheet" href="../css/insert_livres.css"> <!-- Lien vers votre fichier CSS -->

    <main>
        <section>
            <h2>Ajouter un livre</h2>
            <form action="ajouter_livre.php" method="POST">
                <div class="form-group">
                    <label for="titre">Titre du livre:</label>
                    <input type="text" id="titre" name="titre" required>
                </div>

                <div class="form-group">
                    <label for="auteur">Auteur:</label>
                    <input type="text" id="auteur" name="auteur" required>
                </div>

                <div class="form-group">
                    <label for="annee">Année de publication:</label>
                    <input type="number" id="annee" name="annee" required>
                </div>

                <div class="form-group">
                    <label for="genre">Genre:</label>
                    <input type="text" id="genre" name="genre" required>
                </div>

                <div class="form-group">
                    <label for="resume">Résumé:</label>
                    <textarea id="resume" name="resume" rows="4" required></textarea>
                </div>

                <button type="submit" class="add">Ajouter le livre</button>
            </form>
        </section>
    </main>
</body>
</html>