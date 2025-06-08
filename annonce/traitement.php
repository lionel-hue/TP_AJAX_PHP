<?php
include("../main/database.php");


if( isset( $_POST["titre"] ) && isset( $_POST["description"] ) && isset( $_FILES["i_mage"]) ){
    
    $titre = strip_tags($_POST["titre"]);
    $description = strip_tags($_POST["description"]);

    $f_info = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $f_info->file($_FILES["i_mage"]["tmp_name"]);


    /*Verifiez si on utilise la method post pour venir dans ce script aussi bien que de
    **verifier si le fichier on veut envoyer n'est pas vide aussi bien que de voir si 
    **c'est uniquement les images(png, jpg et gif) que sont envoyees et sinon, retourner a register.php
    */
    $_SERVER["REQUEST_METHOD"] !== "POST" || 
    empty($_FILES["i_mage"]) ||
    !in_array( $_FILES["i_mage"]["type"], ["image/gif", "image/png", "image/jpeg"] )?
    header("Location: register.php"):0;

    //si'l y a des erreurs au niveau de l'envoie de l'image au serveur...
    if( $_FILES["i_mage"]["error"] !== UPLOAD_ERR_OK )
    {
        switch($_FILES["i_mage"]["error"])
        {
            case UPLOAD_ERR_PARTIAL:
                echo "<script>alert('File only partially uploaded')</script>";
                exit();
                break;

            case UPLOAD_ERR_EXTENSION:
                echo "<script>alert('File upload stopped by a php extension')</script>";
                exit();
                break;
            
            default:
                echo "<script>alert('Unknown upload error')</script>";
                break;
        }
    }

    //ce code est pour assurer que les characteres speciaux que
    //l'utilisateur tentera a utiliser est convertir a un caractere underscore
    $pathinfo = pathinfo( $_FILES["i_mage"]["name"] );
    $base = $pathinfo["filename"];
    $base = preg_replace("/[^\w-]/", "_", $base);
    
    $filename = $base . "." . $pathinfo["extension"];
    $destination = __DIR__. "/../uploads/" .$filename;
    
    //si le televersement echoue...
    echo !move_uploaded_file($_FILES["i_mage"]["tmp_name"], $destination) ?
     "<script>alert('Cannot move uploaded file')</script>":"";

    print_r($_FILES["i_mage"]); 
    echo $destination;
    exit();


    try{
        $req = $pdo->prepare("INSERT INTO Users(nom, prenom, email, mot_de_passe) VALUES(:nom, :prenom, :email, :mot_de_passe)");

        $req->execute(["nom"=> $nom, "prenom" => $prenom, "email"=>$email, "mot_de_passe" => $mot_de_passe]);

        header("Location: ../main/users.php");

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
else header("Location: ../main/users.php");
?>