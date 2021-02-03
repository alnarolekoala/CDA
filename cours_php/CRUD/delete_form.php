<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
<?php
   require "../BDD/connexion_BDD.php";

   $disc_id = $_GET['disc_id'];

$requete = "SELECT * FROM disc where disc_id=".$disc_id;
$result = $db->query($requete);


$row = $result->fetch(PDO::FETCH_OBJ);


?>


<div class="container"> 
    <form action="delete_script.php" method="POST">
       
        <img class="offset-3 col-6 offset-3 img-responsive" src="../image/<?=$row->disc_picture?>" alt='image2' title="image" height='auto' width='300' id="imagefix">
        <h1 style=" text-align: center; font-weight: 800;"><?= $row->disc_title?><h1>
            <p class="offset-3 col-6 offset-3"> Êtes vous sûr de vouloir supprimer <strong>"<?=$row->disc_title?>"</strong> de la base de données ?<p>
        
            <input type="hidden" name="disc_id" value="<?=$row->disc_id?>">
        <button type="submit"  class="btn btn-danger btn-lg" style="margin-left: 38%; border-radius: 0.7em;">Supprimer</button>
        <a href="details_disc.php?disc_id=<?= $row->disc_id?>"><button type="button"  class="btn btn-success btn-lg" style="margin-left: 5%; border-radius: 0.7em;">Annuler</button><br><br></a>
      

    </form>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>