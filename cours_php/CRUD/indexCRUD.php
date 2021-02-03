<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="CSS/style.css">
    <link rel="stylesheet" media="screen and (max-width: 992px)" href="CSS/style.css">
       <title>Velvet Records</title>
</head>
<body>
    
<?php
require "../BDD/connexion_BDD.php";
$requete = ("SELECT * FROM disc");
$result = $db->query($requete);
$nbLigne = $result->rowCount();
?>
<header class="container"> 
    <span class="infoList col-5">Liste des disques (<?= $nbLigne ?>)</span>


    <a href="add_form.php" class="offset-3 col-1"><button type="button" id="ajout" class="btn btn-primary">Ajouter</button></a>
</header>

<div class="container">
    <div class="row">
<?php
$requete = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
while ($ligne = $requete->fetch(PDO::FETCH_OBJ)) 
{?>
   <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5">
<img class="img-responsive" src="../image/<?= $ligne->disc_picture?>" title="<?= $ligne->disc_title?>" width="200">
<span class="title"><?= $ligne->disc_title?></span>
<span class="nom"><?= $ligne->artist_name?></span>
<span class="label"><span class="bold">Label : </span><?= $ligne->disc_label?></span>
<span class="annee"><span class="bold">Year : </span><?= $ligne->disc_year?></span>
<span class="genre"><span class="bold">Genre : </span><?= $ligne->disc_genre?></span>

<a href="details_disc.php?disc_id=<?= $ligne->disc_id?>"><button type="button" class="btn btn-primary" id="details">Details</button></a>
   </div>
<?php   
}
?>

    </div>
</div>

<a href="../index.php" class="fixed_bot">Retour au Menu</a> <br>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>