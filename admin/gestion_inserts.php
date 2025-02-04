<?php 
require_once('../connection/connection.php');
// Logique de recherche pour les catégories
$searchCategorie = isset($_GET['search_categorie']) ? '%' . $_GET['search_categorie'] . '%' : '%';
$req1 = $pdo->prepare("SELECT * FROM categories WHERE nom_categorie LIKE :searchCategorie");
$req1->bindParam(':searchCategorie', $searchCategorie, PDO::PARAM_STR);
$req1->execute();
$categories = $req1->fetchAll();

// Logique de recherche pour les auteurs
$searchAuteur = isset($_GET['search_auteur']) ? '%' . $_GET['search_auteur'] . '%' : '%';
$req2 = $pdo->prepare("SELECT * FROM auteur WHERE nom_auteur LIKE :searchAuteur");
$req2->bindParam(':searchAuteur', $searchAuteur, PDO::PARAM_STR);
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
    <form action="" method="GET">
    <div class="search-bar">
            <input type="text" name="search_categorie" placeholder="Rechercher une categorie..." value="<?php echo isset($_GET['search_categorie']) ? htmlspecialchars($_GET['search_categorie']) : ''; ?>">
            <button type="submit">Rechercher</button>
        </div>
    </form>
    <a class="add" href="inserts.php">Ajouter une categorie</a>
    <br>
    <br>
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
</section>

<section id="livres">
    <h2>Gestion des auteurs</h2>
    <form action="" method="GET">
    <div class="search-bar">
            <input type="text" name="search_auteur" placeholder="Rechercher un auteur..." value="<?php echo isset($_GET['search_auteur']) ? htmlspecialchars($_GET['search_auteur']) : ''; ?>">
            <button type="submit">Rechercher</button>
    </div>
        </form>
        <a class="add" href="inserts.php">Ajouter un auteur</a>
        <br>
        <br>
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
                          <a href="auteur_modification.php?id_auteur=' . urlencode($auteur['id_auteur']) . '" class="edit">Modifier</a> 
                          <a href="supp_auteur.php?id='. urlencode($auteur['id_auteur']) . '" class="delete" onclick="if(confirm(\'Êtes-vous sûr de vouloir supprimer cette auteur ?\')){return true;}else{event.preventDefault();}">Supprimer</a>
                          </td>';
                    echo '</tr>';
                    $i++;
                }
            ?>
        </tbody>
    </table>
</section>
</main>

</body>
</html>
