<?php 
include("../main/check-auth.php");
require("../main/database.php");
if( isset($_GET["id"]) )
{
    if(!empty($_GET["id"]))
    {
        $id = strip_tags($_GET["id"]);
        $req = $pdo->prepare("DELETE FROM Users WHERE id=:id");
        $stmt = $req->execute(['id'=> $id]);
        
        if($stmt)
        {
            header("Location: ../main/users.php");
        }
        else{
            echo "Erreur!";
        }
    }else{
        header("Location: ../main/users.php");
    }
}else{
    header("Location: ../main/users.php");
}
?>