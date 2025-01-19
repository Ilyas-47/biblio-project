<?php 
require_once('../connection/connection.php');
$req1 = $pdo->query("SHOW COLUMNS FROM utilisateurs LIKE 'role'");
$column = $req1->fetch(PDO::FETCH_ASSOC);

$req2 = $pdo->query("SHOW COLUMNS FROM utilisateurs LIKE 'role'");
$column = $req2->fetch(PDO::FETCH_ASSOC);

$roles = [];
if ($column) {
    preg_match("/^enum\('(.*)'\)$/", $column['Type'], $matches);
    if (isset($matches[1])) {
        $roles = explode("','", $matches[1]);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php')?>
<link rel="stylesheet" href="../css/insert.css"> 
    <main>
        <section>
            <h2>Ajouter un utilisateur</h2>
            <form action="insert_user.php" method="POST">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe:</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" required>
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select class="form-group" id="role" name="role" required>
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