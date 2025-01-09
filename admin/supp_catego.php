<?php
include("../connexion/connexion.php");
if(isset($_GET['idsup'])){
    try{
        $supp=$_GET['idsup'];
        $req1=$pdo->prepare('DELETE FROM categories WHERE id_categorie=:supp_code');
        $req1->bindParam(':supp_code', $supp);
        $req1->execute();
        $req1->closeCursor();
        header('location:gestion_inserts.php');
    }catch(PDOException $e){
        echo "<h1>error</h1>" ; 
    }
}else{
    header("location:gestion_inserts.php");
}
