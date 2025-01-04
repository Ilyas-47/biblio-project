<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php')?>
<link rel="stylesheet" href="../css/insert_livres.css"> <!-- Lien vers votre fichier CSS -->

    <main>
        <section>
            <h2>Ajouter un utilisateur</h2>
            <form action="ajouter_livre.php" method="POST">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" required>
                </div>

                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="Email" id="Email" name="Email" required>
                </div>

                <div class="form-group">
                    <label for="annee">date d'inscription:</label>
                    <input type="number" id="annee" name="annee" required>
                </div>

                <div class="form-group">
                    <label for="Role">Role:</label>
                    <input type="text" id="Role" name="Role" required>
                </div>

                <button type="submit" class="add">Ajouter l'utilisateur</button>
            </form>
        </section>
    </main>
</body>
</html>