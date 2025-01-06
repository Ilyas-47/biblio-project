<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php')?>
<link rel="stylesheet" href="../css/insert.css"> 
    <main>
        <section>
            <h2>Modifier un utilisateur</h2>
            <form action="#" method="POST">
               <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" id="nom" name="nom" value="aaa" required readonly>
                </div>

                <div class="form-group">
                   <label for="Email">Email:</label>
                   <input type="Email" id="Email" name="Email" required readonly>
                </div>

                <div class="form-group">
                   <label for="password">Mot de passe:</label>
                   <input type="password" id="password" name="password" required readonly>
                </div>

                <div class="form-group">
                    <label for="Role">Role:</label>
                    <select class="form-group" id="Role" name="Role" required>
                        <option value="">Sélectionnez un role</option>
                        <option value="role 1">role 1</option>
                        <option value="role 2">role 2</option>
                    </select>
                </div>

                <button type="submit" class="add" onclick="return confirm('Vous confirmez ces modification ?')">modifier</button>
            </form>
        </section>
    </main>
</body>
</html>