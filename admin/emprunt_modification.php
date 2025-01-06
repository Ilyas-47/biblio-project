<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php')?>
<link rel="stylesheet" href="../css/insert.css"> 
    <main>
        <section>
            <h2>Modifier une Emprunt</h2>
            <form action="#" method="POST">
               <div class="form-group">
                  <label for="nom">Nom de client:</label>
                  <input type="text" id="nom" name="nom" value="aaa" required readonly>
                </div>

                <div class="form-group">
                   <label for="livre">Nom de livre:</label>
                   <input type="text" id="livre" name="livre" required readonly>
                </div>

                <div class="form-group">
                   <label for="date">Date d'emprunt:</label>
                   <input type="date" id="date" name="date" required readonly>
                </div>

                <div class="form-group">
                   <label for="date">Date de retour:</label>
                   <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="Statut">Statut:</label>
                    <select class="form-group" id="Statut" name="Statut" required>
                        <option value="">Sélectionnez un role</option>
                        <option value="Statut 1">Statut 1</option>
                        <option value="Statut 2">Statut 2</option>
                        <option value="Statut 3">Statut 3</option>
                    </select>
                </div>

                <button type="submit" class="add" onclick="return confirm('Vous confirmez ces modification ?')">modifier</button>
            </form>
        </section>
    </main>
</body>
</html>