<?php 
include("../main/head.php");

include("../main/database.php");

//message d'erreur a mettre si email ou mot de passe n'est pas correct
$error = "mot de passe ou email n'est pas correct!";

//echo("hey");  operation de test

if( isset($_POST["email"]) && isset($_POST["password"] ) )
{
    if( !empty($_POST["email"]) && !empty($_POST["password"]) )
    {
        $email = strip_tags($_POST["email"]);
        $password = $_POST["password"];

        try
        {
            $req = $pdo->prepare("SELECT * FROM Users WHERE email = :email");
            $req->execute(['email' => $email]);
            $user = $req->fetch(PDO::FETCH_ASSOC);
            
            //si user n'existe pas
            if( !$user )
            {
                echo $error;
            }else{
                //user existe - ok, verifions mot de passe :
                $est_mdpasse_vrai = password_verify( $password, $user["mot_de_passe"]);

                if( $est_mdpasse_vrai == true )
                {
                    header("Location: ../main/users.php");
                }else echo $error;
            }
        }catch(PDOException $e){
            echo "<script>alert(\"".$e->getMessage()."\")</script>";
        }

    }else echo "Erreur lors du login! ressayer plustard!";

}else header("Location: login.php");

include("../main/footer.php");
?>