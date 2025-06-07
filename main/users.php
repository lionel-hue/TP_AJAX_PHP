<?php 
include("check-auth.php");
include("../main/head.php");

require("../main/database.php"); 
$req = $pdo->query("SELECT * FROM Users");
$users = $req->fetchAll(PDO::FETCH_ASSOC);
//Afficher en format json les informations de la table
// print_r(json_encode($users));
// exit();
?>


<div class="row justify-content-end mt-4 mb-3">
    <div class="col-md-3">
       <a href="../user/register.php?email=<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '' ?>" class="btn btn-primary">

            Enregistrer un user
        </a>
    </div>
</div>
<div class="col-md-12 m-2 row table-responsive">

 
    <table class="table table-borderd table-striped">
        <thead>
            <td>ID</td>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Email</td>
            <td>action</td>
        </thead>
        <!-- Au lieu d'un foreach -->
        <?php foreach($users as $user): ?>
            <tr>
                <td> <?php echo $user["id"] ?> </td>
                <td> <?php echo $user["nom"] ?> </td>
                <td> <?php echo $user["prenom"] ?> </td>
                <td> <?php echo $user["email"] ?> </td>
                <td>
                    <!--Ici on prepare la suppression et modification de chaque 'users' avec la balise a-->
                    <a href="../user/delete.php?id=<?php echo $user["id"]?>#email=<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '' ?>" class="btn btn-danger">supprimer</a>
                    <a  class="btn btn-primary" href="../user/modifier.php?id=<?php echo $user["id"] ?>">modifier</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>                
</div>
<?php include("../main/footer.php"); ?>
