<?php
require_once('../connection/connection.php');

// Retrieve user data based on ID
$userId = $_GET['id'];
$req = $pdo->prepare("SELECT * FROM utilisateurs WHERE id_user = :id_user");
$req->execute(['id_user' => $userId]); 
$userData = $req->fetch();

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
<?php include('admin_nav.php') ?>
<link rel="stylesheet" href="../css/insert.css">
<main>
    <section>
        <h2>Modifier un utilisateur</h2>
    <form action="modification_user.php" method="POST">
                <input type="hidden"  name="id_user" value="<?php echo htmlspecialchars($userData['id_user']); ?>" readonly>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="<?php echo $userData['nom']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $userData['email']; ?>"readonly>
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe:</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" value="<?php echo $userData['mot_de_passe']; ?>"readonly>
            </div>

           <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="role" name="role" required>
                <?php foreach ($roles as $role) : ?>
                    <option value="<?php echo $role; ?>" 
                    <?php if($role == $userData['role']) echo 'selected'; ?>>
                        <?php echo $role; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

            <button type="submit" class="add" onclick="return confirm('Vous confirmez ces modifications ?')">Modifier</button>
        </form>
    </section>  
</main>
</body>
</html>
