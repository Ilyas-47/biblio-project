<?php
require_once('../connection/connection.php');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['titre']) && isset($_FILES['image'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $auteurId = htmlspecialchars($_POST['auteur']);
    $categorieId = htmlspecialchars($_POST['categorie']);
    $disponibilite = htmlspecialchars($_POST['disponibilite']);
    $description = htmlspecialchars($_POST['description']);

    $image = $_FILES['image']['name'];
    $imagePath = '../images/' . basename($image);

    echo "Auteur sélectionné ID : $auteurId<br>";
    echo "Catégorie sélectionnée ID : $categorieId<br>";

    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        try {
            $req = $pdo->prepare("INSERT INTO livres (titre, image, id_auteur, id_categorie, disponibilite, description_livre) 
                                  VALUES (:titre, :image, :auteur, :categorie, :disponibilite, :description)");
            $req->bindValue(':titre', $titre);
            $req->bindValue(':image', $imagePath);
            $req->bindValue(':auteur', $auteurId);
            $req->bindValue(':categorie', $categorieId);
            $req->bindValue(':disponibilite', $disponibilite);
            $req->bindValue(':description', $description);

            if ($req->execute()) {
                header("location:gestion_livres.php?message=success");
                exit();
            } else {
                die("Erreur lors de l'ajout du livre : " . var_export($req->errorInfo(), true));
            }
        } catch (PDOException $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    } else {
        die("Erreur lors du téléversement de l'image.");
    }
} else {
    header("location:gestion_livres.php");
    exit();
}
?>
