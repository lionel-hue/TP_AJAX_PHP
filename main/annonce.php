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
    <?php foreach($annonces as $annonce): ?>
        <div>
            <h1> <?php echo $annonce["titre"] ?> </h1>
            <p> <?php echo $annonce["description"] ?> </p>
            <img src="../uploads/<?php echo $annonce["image"]?>" width="30%" alt="." />
            <br>
            <br>
            <div>
                <a class="btn btn-danger" href="../annonce/delete.php?id=<?php echo $annonce["id"]?>">supprimer</a>

                <a  class="btn btn-primary" href="../annonce/modifier.php?id=<?php echo $annonce["id"] ?>">modifier</a>
            </div>
        </div>
        <br>
    <?php endforeach; ?>
</div>
<?php include("../main/footer.php"); ?>
