<?php
require_once('../connection/connection.php');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['titre'])) {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $Categorie = $_POST['Categorie'];
    $Disponibilite = $_POST['Disponibilite'];
    $Description = $_POST['Description'];

    try {
        $reqAuteur = $pdo->prepare("SELECT id_auteur FROM auteur WHERE nom_auteur = :auteur");
        $reqAuteur->bindValue(':auteur', $auteur);
        $reqAuteur->execute();
        $auteurId = $reqAuteur->fetchColumn();

        $reqCategorie = $pdo->prepare("SELECT id_categorie FROM categories WHERE nom_categorie = :Categorie");
        $reqCategorie->bindValue(':Categorie', $Categorie);
        $reqCategorie->execute();
        $categorieId = $reqCategorie->fetchColumn();

        if ($auteurId && $categorieId) {
            $req = $pdo->prepare("INSERT INTO livres (titre, id_auteur, id_categorie, disponibilite, description_livre) 
                                  VALUES (:titre, :auteur, :Categorie, :Disponibilite, :description)");
            $req->bindValue(':titre', $titre);
            $req->bindValue(':auteur', $auteurId);
            $req->bindValue(':Categorie', $categorieId);
            $req->bindValue(':Disponibilite', $Disponibilite);
            $req->bindValue(':description', $Description);

            if ($req->execute()) {
                header("location:gestion_livres.php");
                exit();
            } else {
                die("Erreur lors de l'ajout du livre : " . var_export($req->errorInfo(), true));
            }
        } else {
            die("Auteur ou catégorie introuvable.");
        }
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
} else {
    header("location:gestion_livres.php");
    exit();
}
?>
