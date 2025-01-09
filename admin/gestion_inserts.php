<?php 
 require_once('../connection/connection.php');
 $req1=$pdo->prepare("SELECT * FROM categories" );
 $req1->execute();
 $categories=$req1->fetchAll();

 $req2=$pdo->prepare("SELECT * FROM auteur" );
 $req2->execute();
 $auteurs=$req2->fetchAll();
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
                          <a  class="edit">Modifier</a>
                          <a href="supp_catego.php?idsup=<?php=$categorie['id_categorie']?>" class="delete">Supprimer</a>  '                        
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
                        <th>description</th>
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
                          <a class="edit">Modifier</a>
                          <a class="delete">Supprimer</a></td>';
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