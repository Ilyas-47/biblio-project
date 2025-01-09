<?php 
require_once('../connection/connection.php');
$req1 = $pdo->query("SHOW COLUMNS FROM utilisateurs LIKE 'role'");
$column = $req1->fetch(PDO::FETCH_ASSOC);

if ($column) {
    preg_match("/^enum\('(.*)'\)$/", $column['Type'], $matches);
    $roles = explode("','", $matches[1]);
} else {
    $roles = []; 
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php')?>
<link rel="stylesheet" href="../css/insert.css"> 
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
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="Role">Role:</label>
                    <select class="form-group" id="Role" name="Role" required>
                        <option value="">Sélectionnez un role</option>
                      <?php  foreach ($roles as $role) {
                echo "<option value=\"$role\">$role</option>";
                     }?>                    
                    </select>
                </div>

                <button type="submit" class="add">Ajouter l'utilisateur</button>
            </form>
        </section>
    </main>
</body>
</html>