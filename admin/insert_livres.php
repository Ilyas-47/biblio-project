<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="../css/insert.css"> 
<body>
    <?php include('admin_nav.php'); ?> 
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
                    <select class="form-group" id="auteur" name="auteur" required>
                        <option value="">Sélectionnez un auteur</option>
                        <option value="Auteur 1">Auteur 1</option>
                        <option value="Auteur 2">Auteur 2</option>
                        <option value="Auteur 3">Auteur 3</option>
                    </select> 
                </div>

                <div class="form-group">
                    <label for="Categorie">Categorie:</label>
                    <select class="form-group" id="Categorie" name="Categorie" required>
                        <option value="">Sélectionnez une categorie</option>
                        <option value="Categorie 1">Categorie 1</option>
                        <option value="Categorie 2">Categorie 2</option>
                        <option value="Categorie 3">Categorie 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Disponibilite">Disponibilite:</label>
                    <select class="form-group" id="Disponibilite" name="Disponibilite" required>
                        <option value="Disponibilite 1">Disponibilite 1</option>
                        <option value="Disponibilite 2">Disponibilite 2</option>
                        <option value="Disponibilite 3">Disponibilite 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Description">Description:</label>
                    <textarea id="Description" name="Description" rows="4" required></textarea>
                </div>

                <button type="submit" class="add">Ajouter le livre</button>
            </form>
        </section>
    </main>
</body>
</html>