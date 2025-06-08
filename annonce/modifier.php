<?php 
include("../main/head.php");

//Toujours, on se connecte a la bdd, d'abord
require("../main/database.php");

//Simplification de la declaration et initialisation des vars a une seul val
$success = $error="";

//depuis la balise a avec val = 'modifier' de afficher.php
if( isset($_GET["id"]) )
{
    if(!empty($_GET["id"]))
    {
        $id = strip_tags($_GET["id"]);
        $req = $pdo->prepare("SELECT * FROM Users WHERE id=:id");
        $req->execute(["id" => $id ]);
        $user = $req->fetch(PDO::FETCH_ASSOC); 
        // echo "foo bar";

    }
    else{
        echo "Erreur!";
    }
}else{
    $email = $user['email'];
    header("Location: ../main/users.php");
}

//Traitement du formulaire de modification
if(  isset( $_POST["id"] ) && isset( $_POST["nom"] ) && isset( $_POST["prenom"] ) && isset( $_POST["email"] ) ){

    $id = strip_tags($_POST["id"]);
    $nom = strip_tags($_POST["nom"]);
    $prenom = strip_tags($_POST["prenom"]);
    $email = strip_tags($_POST["email"]);

        $req = $pdo->prepare("UPDATE Users SET nom=:nom, prenom=:prenom, email=:email WHERE id=:id");

        $stmt = $req->execute(["id"=> $id,"nom"=> $nom, "prenom" => $prenom, "email"=>$email]);

        if($stmt)
        {
            echo $success="Votre modification a ete bien effectue!<br>";
            echo "<a href=\"../main/users.php\">retourner</a>";
            exit();
        }else{
            echo $error="Une erreur lors de la modification de vos donnees!<br>";
            echo "<a href=\"../main/users.php\">retourner</a>";
            exit();
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/bootstrap/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../asset/css/style.css" type="text/css"/>
</head>
<body>
    <!-- <h1 class="text-primary">Hello World</h1> -->
    <div class="container">
        
        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-7 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Modification</h1>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($success)): ?>
                            <div class="row alert alert-success">
                                <span class="text-center">
                                    <?php echo $success ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($error)): ?>
                            <div class="row alert alert-danger">
                                <span class="text-center">
                                    <?php echo $error ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="" class="form-control">
                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>" >

                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" value="<?php echo $user['nom'] ?>" class ="form-control" required />
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="prenom">Prenom :</label>
                                <input type="text" name="prenom" value="<?php echo $user['prenom'] ?> " class ="form-control" required />
                                
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value=" <?php echo $user['email'] ?> " class ="form-control" required />
                                
                            </div>

                            <input type="submit" class="btn btn-primary" value="modifier" />
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../asset/js/bootstrap/bootstrap.js" type="text/javascript"></script>
    <script src="../asset/js/script.js"></script>
</body>
</html>

<?php include("../main/footer.php") ?>