<?php 
require_once('../connection/connection.php');
$req1 = $pdo->prepare("SELECT * FROM categories");
$req1->execute();
$categories = $req1->fetchAll();

$req2 = $pdo->prepare("SELECT * FROM auteur");
$req2->execute();
$auteurs = $req2->fetchAll();

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script>alert('Categorie est supprimé avec succès!');</script>";
}elseif (isset($_GET['success']) && $_GET['success'] == 0) {
    echo "<script>alert('Auteur est supprimé avec succès!');</script>";
}elseif (isset($_GET['success']) && $_GET['success'] == 2) {
    echo "<script>alert('Auteur est modifier avec succès!');</script>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php') ?> 
<section id="livres">
    <h2>Gestion des Categories</h2>
    <div class="search-bar">
        <input type="text" placeholder="Rechercher une categorie...">
        <button>Rechercher</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Categorie</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                foreach($categories as $categorie){
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$categorie['nom_categorie'].'</td>';
                    echo '<td>
                         <a href="supp_catego.php?idsup='. urlencode($categorie['id_categorie']) . '" class="delete" onclick="if(confirm(\'Êtes-vous sûr de vouloir supprimer cette categorie ?\')){return true;}else{event.preventDefault();}">Supprimer</a>
                          </td>';
                    echo '</tr>';
                    $i++;
                } 
            ?>
        </tbody>
    </table>
    <a class="add" href="inserts.php">Ajouter une categorie</a>
</section>

<section id="livres">
    <h2>Gestion des auteurs</h2>
    <div class="search-bar">
        <input type="text" placeholder="Rechercher un auteur...">
        <button>Rechercher</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                foreach($auteurs as $auteur){
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$auteur['nom_auteur'].'</td>';
                    echo '<td>'.$auteur['description'].'</td>';
                    echo '<td>
                          <a href="modification_auteur.php?id_auteur=' . urlencode($auteur['id_auteur']) . '" class="edit">Modifier</a> 
                          <a href="supp_auteur.php?id_auteur='. urlencode($auteur['id_auteur']) . '" class="delete" onclick="if(confirm(\'Êtes-vous sûr de vouloir supprimer cette auteur ?\')){return true;}else{event.preventDefault();}">Supprimer</a>
                          </td>';
                    echo '</tr>';
                    $i++;
                }
            ?>
        </tbody>
    </table>
    <a class="add" href="inserts.php">Ajouter un auteur</a>
</section>
</main>

</body>
</html>
