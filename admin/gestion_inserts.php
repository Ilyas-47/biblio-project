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
                    <tr>
                        <td>1</td>
                        <td>Categorie 1</td>
                        <td>
                            <a class="delete">Supprimer</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Categorie 2</td>
                        <td>
                            <a class="delete">Supprimer</a>
                        </td>
                    </tr>
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
                    <tr>
                        <td>1</td>
                        <td>auteur 1</td>
                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore sequi, est recusandae consequuntur cumque dolore.</td>
                        <td>
                            <a href="auteur_modification.php" class="edit">Modifier</a>
                            <a class="delete">Supprimer</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>auteur 2</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde consequatur eaque repellendus placeat velit delectus?</td>
                        <td>
                            <a href="auteur_modification.php" class="edit">Modifier</a>
                            <a class="delete">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="add" href="inserts.php">Ajouter un auteur</a>
        </section>
        </main>

</body>
</html>