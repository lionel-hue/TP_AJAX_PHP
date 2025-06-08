<?php 
include("../main/head.php");

require("../main/database.php"); 
$req = $pdo->query("SELECT * FROM Annonces");
$annonces = $req->fetchAll(PDO::FETCH_ASSOC);
//Afficher en format json les informations de la page
// print_r(json_encode($annonces));
// exit();
?>


<div class="row justify-content-end mt-4 mb-3">
    <div class="col-md-3">
        <a href="../annonce/register.php?" class="btn btn-primary">
            Enregisrer une annonce
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
        <?php foreach($annonces as $annonce): ?>
            <!-- <tr>
                <td> <?php echo $user["id"] ?> </td>
                <td> <?php echo $user["nom"] ?> </td>
                <td> <?php echo $user["prenom"] ?> </td>
                <td> <?php echo $user["email"] ?> </td>
                <td>
                    Ici on prepare la suppression et modification de chaque 'users' avec la balise a
                    <a class="btn btn-danger" href="../user/delete.php?id=<?php echo $user["id"]?>#email=<?php echo $_GET['email'] ?>">supprimer</a>
                    <a  class="btn btn-primary" href="../user/modifier.php?id=<?php echo $user["id"] ?>">modifier</a>

                </td>
            </tr> -->
        <?php endforeach; ?>
    </table>                
</div>
<?php include("../main/footer.php"); ?>
