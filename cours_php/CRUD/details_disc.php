<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Details</title>
</head>
<body>

<?php 
$disc_id = $_GET['disc_id']; 
    require "../BDD/connexion_BDD.php";
    $requete = "SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id=".$disc_id;
    $result = $db->query($requete);
    $row = $result->fetch(PDO::FETCH_OBJ);

    ?>
    <h1 class="offset-2 col-10">Details</h1>


<div class='container'>
    <form action="" method="GET" enctype="multipart/form-data" class="col-12">
        <div class="row">
            <div class="form-group col-5">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" readonly value="<?= $row->disc_title?>">
            
            </div>
            <div class="form-group col-5">
                <label for="artist">Artist</label>
                <input type="text" class="form-control" id="artist" aria-describedby="emailHelp" readonly value="<?= $row->artist_name?>">
            </div>
            <div class="form-group col-5">
                <label for="year">Year</label>
                <input type="text" class="form-control" id="year" aria-describedby="emailHelp" readonly value="<?= $row->disc_year?>">
            
            </div>
            <div class="form-group col-5">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" readonly value="<?= $row->disc_genre?>">
            </div>
            <div class="form-group col-5">
                <label for="label">Label</label>
                <input type="text" class="form-control" id="label" aria-describedby="emailHelp" readonly value="<?= $row->disc_label?>">
            
            </div>
            <div class="form-group col-5">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" readonly value="<?= $row->disc_price?>">
            </div>
            <div class="form-group col-5">
                <label for="picture">Picture</label>
                <img class="img-responsive" src="../image/<?= $row->disc_picture?>" title="<?= $row->disc_title?>" width="400">
            </div>
          
            </div>
            <div> 
            <a href="update_form.php?disc_id=<?= $row->disc_id?>"><button type="button" id="ajoute" class="btn btn-primary">Modifier</button></a>
            <a href="delete_form.php?disc_id=<?= $row->disc_id?>"><button type="button" id="back" class="btn btn-primary">Supprimer</button></a>
            <a href="indexCRUD.php"><button type="button" id="back" class="btn btn-primary">Retour</button></a>
          
        </div>
    </form>
</div>

    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>