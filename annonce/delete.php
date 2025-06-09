<?php 
require("../main/database.php");
if( isset($_GET["id"]) )
{
    if(!empty($_GET["id"]))
    {
        $id = strip_tags($_GET["id"]);
        $req = $pdo->prepare("DELETE FROM Annonces WHERE id=:id");
        $stmt = $req->execute(['id'=> $id]);
        
        if($stmt)
        {
            header("Location: ../main/annonce.php");
        }
        else{
            echo "Erreur!";
        }
    }else{
        header("Location: ../main/annonce.php");
    }
}else{
    header("Location: ../main/annonce.php");
}
?>