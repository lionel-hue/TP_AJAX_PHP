<?php

include("../main/database.php");

if( isset( $_POST["firstname"] ) && isset( $_POST["lastname"] ) && isset( $_POST["email"] ) && isset( $_POST["password"]) && isset($_POST["password_confirm"]) ){

    if( $_POST["password"] != $_POST["password_confirm"] )
    {
        echo "<p>erreur!, les mots de passes fournis ne correspondent pas!</p><a href=\"./register.php\">retourner</a>";
        exit();
    }
     $nom = strip_tags($_POST["lastname"]);
     $prenom  = strip_tags($_POST["firstname"]);
     $email = strip_tags($_POST["email"]);
     $mot_de_passe = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try{
        $req = $pdo->prepare("INSERT INTO Users(nom, prenom, email, mot_de_passe) VALUES(:nom, :prenom, :email, :mot_de_passe)");

        $req->execute(["nom"=> $nom, "prenom" => $prenom, "email"=>$email, "mot_de_passe" => $mot_de_passe]);

        header("Location: login.php");

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
else header("Location: register.php");
?>