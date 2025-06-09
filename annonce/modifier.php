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
        $req = $pdo->prepare("SELECT * FROM Annonces WHERE id=:id");
        $req->execute(["id" => $id ]);
        $annonce = $req->fetch(PDO::FETCH_ASSOC);
    }
    else{
        echo "Erreur!";
    }
}else{
    //$email = $user['email'];
    header("Location: ../main/annonce.php");
}

//Traitement du formulaire de modification
if( isset( $_POST["titre"] ) && isset( $_POST["description"] ) && isset( $_FILES["i_mage"]) ){

   $titre = strip_tags($_POST["titre"]);
    $description = strip_tags($_POST["description"]);

    include("./code_de_gestion_d_image.php");

    try{
    
        $req = $pdo->prepare("UPDATE Annonces SET titre=:titre, description=:description, image=:image WHERE id=:id");

        $stmt = $req->execute(
            [
                "id"=> $id,
                "titre"=> $titre, 
                "description" => $description, 
                "image"=>$filename
            ]
        );

        if($stmt)
        {
            echo $success="Votre modification a ete bien effectue!<br>";
            echo "<a href=\"../main/annonce.php\">retourner</a>";
            exit();
        }else{
            echo $error="Une erreur lors de la modification de vos donnees!<br>";
            echo "<a href=\"../main/annonce.php\">retourner</a>";
            exit();
        }

    }catch(PDOException $e){
        echo $e->getMessage();
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

                        <form method="POST" action="" class="form-control" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $annonce['id'] ?>">

                            <div class="mb-3">
                                <label for="titre" class="form-label">Titre</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" id="titre" name="titre" placeholder="le titre d'annonce"  value="<?php echo $annonce['titre'] ?>" required>
                                </div>

                                <label for="description" class="form-label">Description</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="La description de l'annonce" value="<?php echo $annonce['description'] ?>" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="i_mage" class="form-label">L'image de l'annonce</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="file" class="form-control" id="i_mage" name="i_mage">
                                </div>
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