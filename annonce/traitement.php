<?php
include("../main/database.php");


if( isset( $_POST["titre"] ) && isset( $_POST["description"] ) && isset( $_FILES["i_mage"]) ){
    
    $titre = strip_tags($_POST["titre"]);
    $description = strip_tags($_POST["description"]);

    include("./code_de_gestion_d_image.php");

    try{
        $req = $pdo->prepare("INSERT INTO Annonces(titre, description, image) VALUES(:titre, :description, :image)");

        $req->execute(
            [
                "titre"=> $titre,
                "description" => $description, 
                "image"=>$filename
            ]
        );

        header("Location: ../main/annonce.php");

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
else header("Location: ../main/annonce.php");
?>