<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php') ?> 
<section id="livres">
            <h2>Gestion des Livres</h2>
            <div class="search-bar">
                <input type="text" placeholder="Rechercher un livre...">
                <button>Rechercher</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Categorie</th>
                        <th>Disponibilité</th>
                        <th>date de l ajoute</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Le Petit Prince</td>
                        <td>Antoine de Saint-Exupéry</td>
                        <td>drama</td>
                        <td>Disponible</td>
                        <td>22-02-2024</td>
                        <td>
                            <a href="livers_modification.php" class="edit">Modifier</a>
                            <a class="delete">Supprimer</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1984</td>
                        <td>George Orwell</td>
                        <td>drama</td>
                        <td>Emprunté</td>
                        <td>22-02-2024</td>
                        <td>
                            <a href="livers_modification.php" class="edit">Modifier</a>
                            <a class="delete">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="add" href="insert_livres.php">Ajouter le livre</a>
        </section>
        </main>

</body>
</html>