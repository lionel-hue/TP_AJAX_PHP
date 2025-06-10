<?php 
include("../main/head.php");

require("../main/database.php"); 
$req = $pdo->query("SELECT * FROM Annonces");
$annonces = $req->fetchAll(PDO::FETCH_ASSOC);
//Afficher en format json les informations de la page
// print_r(json_encode($annonces));
// exit();
?>

<!--Comme bootstrap est complique, j'applique un style css rapide sur les annonces de la page-->
<style>
    .element_annonce
    {
        /* border:2px solid black; */
        width:50%;
        padding:2%;
        display:flex;
        align-items:center;
        flex-direction:column;
        border-radius:1rem;
        box-shadow: 3px -3px 3px rgba(0,0,0,0.1);
        /* -webkit-box-shadow: -10px -10px 3px -1px rgba(0,0,0,0.1); */
    }

    .element_annonce h1, .element_annonce p
    {
        width:100%;
    }

    .element_annonce h1
    {
        text-align:center;
    }

    .element_annonce p
    {
        text-align:left;
    }

    .element_annonce img
    {
        width:30%;
    }
</style>


<div class="row justify-content-end mt-4 mb-3">
    <div class="col-md-3">
        <a href="../annonce/register.php?" class="btn btn-primary">
            Enregisrer une annonce
        </a>
    </div>
</div>
<div class="col-md-12 m-2 row table-responsive" style="display:flex; justify-content:center; align-items:center;">
    <?php foreach($annonces as $annonce): ?>
        <div class="element_annonce">
            <h1> <?php echo $annonce["titre"] ?> </h1>
            <p> <?php echo $annonce["description"] ?> </p>
            <img src="../uploads/<?php echo $annonce["image"]?>" alt="." />
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
