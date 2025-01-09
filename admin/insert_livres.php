<?php
require_once('../connection/connection.php');

$req1 = $pdo->prepare("SELECT * FROM auteur");
$req1->execute();
$auteurs = $req1->fetchAll(PDO::FETCH_ASSOC);

$req2 = $pdo->prepare("SELECT * FROM categories");
$req2->execute();
$categories = $req2->fetchAll(PDO::FETCH_ASSOC);

$req3 = $pdo->query("SHOW COLUMNS FROM livres LIKE 'disponibilite'");
$column = $req3->fetch(PDO::FETCH_ASSOC);

if ($column) {
    preg_match("/^enum\('(.*)'\)$/", $column['Type'], $matches);
    $disponibilites = explode("','", $matches[1]);
} else {
    $disponibilites = []; 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="../css/insert.css"> 
<body>
    <?php include('admin_nav.php'); ?> 
    <main>
        <section>
            <h2>Ajouter un livre</h2>
            <form action="insert_livr_db.php" method="POST">
                <div class="form-group">
                    <label for="titre">Titre du livre:</label>
                    <input type="text" id="titre" name="titre" required>
                </div>

                <div class="form-group">
                    <label for="auteur">Auteur:</label>
                    <select class="form-group" id="auteur" name="auteur" required>
                        <option value="">Sélectionnez un auteur</option>
                        <?php foreach ($auteurs as $auteur) { ?>
                            <option value="<?php $auteur['id_auteur']; ?>"><?php echo $auteur['nom_auteur']; ?></option>
                        <?php } ?>
                    </select> 
                </div>

                <div class="form-group">
                    <label for="Categorie">Categorie:</label>
                    <select class="form-group" id="Categorie" name="Categorie" required>
                        <option value="">Sélectionnez une categorie</option>
                        <?php foreach ($categories as $categorie) { ?>
                            <option value="<?php $categorie['id_categorie'] ?>"><?php echo $categorie['nom_categorie']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Disponibilite">Disponibilite:</label>
                    <select class="form-group" id="Disponibilite" name="Disponibilite" required>
                    <?php
            foreach ($disponibilites as $disponibilite) {
                echo "<option value=\"$disponibilite\">$disponibilite</option>";
                     }?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="Description">Description:</label>
                    <textarea id="Description" name="Description" rows="4" required></textarea>
                </div>

                <button type="submit" class="add">Ajouter le livre</button>
            </form>
        </section>
    </main>
</body>
</html>