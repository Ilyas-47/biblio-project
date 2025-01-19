<?php 
require_once('../connection/connection.php');
$req1 = $pdo->prepare("SELECT * FROM utilisateurs");
$req1->execute();
$users = $req1->fetchAll();


if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script>alert('Utilisateur supprimé avec succès!');</script>";
}elseif (isset($_GET['success']) && $_GET['success'] == 0) {
    echo "<script>alert('Utilisateur est modifer avec succès!');</script>";
}

?>

<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php') ?> 
<section id="utilisateurs">
    <h2>Gestion des Utilisateurs</h2>
    
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>date d'inscription</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php 
                $i = 1;
                foreach($users as $user){
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$user['nom'].'</td>';
                    echo '<td>'.$user['email'].'</td>';
                    echo '<td>'.$user['date_inscription'].'</td>';
                    echo '<td>'.$user['role'].'</td>';
                    echo '<td>'
                    . '<a href="user_modification.php?id=' . urlencode($user['id_user']) . '" class="edit">Modifier</a> '
                    . '<a href="supp_user.php?id=' . urlencode($user['id_user']) . '" class="delete" onclick="if(confirm(\'Êtes-vous sûr de vouloir supprimer cet utilisateur ?\')){return true;}else{event.preventDefault();}">Supprimer</a>'
                    . '</td>';
                echo '</tr>';
                $i++;
                }
                ?>
        </tbody>
    </table>
    <a href="insert_users.php" class="add">Ajouter un Utilisateur</a>
</section>
</main>

</body>
</html>
