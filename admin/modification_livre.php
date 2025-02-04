<?php
require_once('../connection/connection.php');

if (isset($_POST['id_livre'], $_POST['titre'], $_POST['auteur'], $_POST['categorie'], $_POST['disponibilite'], $_POST['description_livre'])) {
    $id_livre = $_POST['id_livre'];
    $titre = $_POST['titre'];
    $nom_auteur = $_POST['auteur'];
    $nom_categorie = $_POST['categorie'];
    $disponibilite = $_POST['disponibilite'];
    $description_livre = $_POST['description_livre'];

    try {
        // Récupérer l'identifiant de l'auteur
        $reqAuteur = $pdo->prepare("SELECT id_auteur FROM auteur WHERE nom_auteur = :nom_auteur");
        $reqAuteur->bindParam(':nom_auteur', $nom_auteur);
        $reqAuteur->execute();
        $auteur = $reqAuteur->fetch(PDO::FETCH_ASSOC)['id_auteur'];

        // Récupérer l'identifiant de la catégorie
        $reqCategorie = $pdo->prepare("SELECT id_categorie FROM categories WHERE nom_categorie = :nom_categorie");
        $reqCategorie->bindParam(':nom_categorie', $nom_categorie);
        $reqCategorie->execute();
        $categorie = $reqCategorie->fetch(PDO::FETCH_ASSOC)['id_categorie'];

        // Handling the image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $imageType = $_FILES['image']['type'];
            $imageNameCmps = explode(".", $imageName);
            $imageExtension = strtolower(end($imageNameCmps));
            $newImageName = md5(time() . $imageName) . '.' . $imageExtension;
            $uploadFileDir = '../images/';            
            $destPath = $uploadFileDir . $newImageName;

            // Move the file to the specified directory
            if (!file_exists($uploadFileDir)) {
                echo "Directory does not exist: $uploadFileDir";
                exit;
            }

            if (move_uploaded_file($imageTmpPath, $destPath)) {
                $imageUrl = $destPath;
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                exit;
            }
        } else {
            // Use existing image URL if no new image is uploaded
            $req = $pdo->prepare("SELECT image FROM livres WHERE id_livre = :id_livre");
            $req->bindParam(':id_livre', $id_livre);
            $req->execute();
            $imageUrl = $req->fetch(PDO::FETCH_ASSOC)['image'];
        }

        // Mise à jour du livre
        $req = $pdo->prepare("UPDATE livres SET titre = :titre, id_auteur = :id_auteur, id_categorie = :id_categorie, disponibilite = :disponibilite, description_livre = :description_livre, image = :image WHERE id_livre = :id_livre");
        $req->bindParam(':id_livre', $id_livre);
        $req->bindParam(':titre', $titre);
        $req->bindParam(':id_auteur', $auteur);
        $req->bindParam(':id_categorie', $categorie);
        $req->bindParam(':disponibilite', $disponibilite);
        $req->bindParam(':description_livre', $description_livre);
        $req->bindParam(':image', $imageUrl);
        $req->execute();
        header("location:gestion_livres.php");
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
