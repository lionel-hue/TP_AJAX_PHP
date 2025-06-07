<?php 
session_start();
include("../main/head.php");

include("../main/database.php");
if( $_SERVER['REQUEST_METHOD'] === 'POST')
{
    if( !empty($_POST["email"]) && !empty($_POST["password"]) )
    {
        $email = trim($_POST["email"]?? '');
        $password = $_POST["password"]?? '';

        try
        {
            $req = $pdo->prepare("SELECT * FROM Users WHERE email = :email");
            $req->execute(['email' => $email]);
            $user = $req->fetch(PDO::FETCH_ASSOC);
            
           if (!$user || !password_verify($password, $user["mot_de_passe"])) {
                $_SESSION['error'] = "Email ou mot de passe incorrect.";
                header("Location: login.php");
                exit;
            }

            //  Connexion réussie
            $_SESSION['auth'] = true;
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'prenom' => $user['prenom'],
                'nom' => $user['nom']
            ];

            header("Location: ../main/users.php");
            exit; 
            
        }catch(PDOException $e){
            $_SESSION['error'] = "Erreur serveur : " . $e->getMessage();
            header("Location: login.php");
            exit;
        }

    }else{
          $_SESSION['error'] = "Veuillez remplir tous les champs.";
      header("Location: login.php");
    exit ;
    }
    

}else {
    header("Location: login.php");
 }

include("../main/footer.php");
?>