<!DOCTYPE html>
<html lang="fr">
<?php include('admin_nav.php') ?> 
<section id="utilisateurs">
            <h2>Gestion des Utilisateurs</h2>
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
                    <tr>
                        <td>1</td>
                        <td>Jean Dupont</td>
                        <td>jean.dupont@example.com</td>
                        <td>22-1-2024</td>
                        <td>Admin</td>
                        <td>
                            <a href="" class="edit">Modifier</a>
                            <a href="" class="delete">Supprimer</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Marie Curie</td>
                        <td>marie.curie@example.com</td>
                        <td>10-1-2024</td>
                        <td>Utilisateur</td>
                        <td>
                            <a href="" class="edit">Modifier</a>
                            <a href="" class="delete">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="insert_users.php" class="add">Ajouter un Utilisateur</a>
        </section>
        </main>

</body>
</html>