<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Modifier</title>
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
    <form action="update_script.php" onsubmit="return check(this)" id="checkForm" method="POST" enctype="multipart/form-data" class="col-12">
        <div class="row">
        <input type="hidden" name="disc_id" value="<?=$row->disc_id?>">
        <input type="hidden" name="artist_num" value="<?=$row->artist_id?>">
            <div class="form-group col-5">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="disc_title" name="disc_title" aria-describedby="emailHelp" value="<?php if(isset($_GET['disc_title'])) {echo $_GET['disc_title']; } else {echo $row->disc_title;}?>">
                <?php if( ! empty( $_GET['erreur0'] ) ) ?>  <p class="erreurs" id="MsgErreur0"><?= $_GET['erreur0'];?></p>
            </div>
            <div class="form-group col-5">
                <label for="artist">Artist</label>
                <input type="text" class="form-control" id="artist" name="artist" aria-describedby="emailHelp" value="<?php if(isset($_GET['artist'])) {echo $_GET['artist']; } else {echo $row->artist_name;}?>">
                <?php if( ! empty( $_GET['erreur6'] ) ) ?>  <p class="erreurs" id="MsgErreur6"><?= $_GET['erreur6'];?></p>
            </div>
            <div class="form-group col-5">
                <label for="year">Year</label>
                <input type="text" class="form-control" id="annee" name="annee"aria-describedby="emailHelp" value="<?php if(isset($_GET['annee'])) {echo $_GET['annee']; } else {echo  $row->disc_year;}?>">
                <?php if( ! empty( $_GET['erreur1'] ) ) ?>  <p class="erreurs" id="MsgErreur1"><?= $_GET['erreur1'];?></p>
            </div>
            <div class="form-group col-5">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="<?php if(isset($_GET['genre'])) {echo $_GET['genre']; } else {echo $row->disc_genre;}?>">
                <?php if( ! empty( $_GET['erreur2'] ) )  ?>  <p class="erreurs" id="MsgErreur2"> <?=  $_GET['erreur2'];?></p>
            </div>
            <div class="form-group col-5">
                <label for="label">Label</label>
                <input type="text" class="form-control" id="label" name="label" aria-describedby="emailHelp" value="<?php if(isset($_GET['label'])) {echo $_GET['label']; } else {echo $row->disc_label;}?>">
                <?php if( ! empty( $_GET['erreur3'] ) ) ?>  <p class="erreurs" id="MsgErreur3"><?= $_GET['erreur3'];?></p>
            </div>
            <div class="form-group col-5">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php if(isset($_GET['price'])) {echo $_GET['price']; } else {echo $row->disc_price;}?>">
                <?php if( ! empty( $_GET['erreur4'] ) ) ?>  <p class="erreurs" id="MsgErreur4"><?= $_GET['erreur4'];?></p>
            </div>
            <div class="form-group col-5">
                <label for="picture">Picture</label>
                <input type="file" class="form-control-file" id="picture" name="picture">
                <?php if( ! empty( $_GET['erreur5'] ) ) ?>  <p class="erreurs" id="MsgErreur5"><?= $_GET['erreur5'];?></p>
                <img class="img-responsive" src="../image/<?= $row->disc_picture?>" title="<?= $row->disc_title?>" width="400">
            </div>
          
            </div>
            <div> 
                <button type="submit" id="ajoute" class="btn btn-primary">Modifier</button>
           
            <a href="details_disc.php?disc_id=<?= $row->disc_id?>"><button type="button" id="back" class="btn btn-primary">Retour</button></a>
          
            </div>
        </div>
    </form> 
</div>
    
    <script src="JS/Update_script.js"></script>
</body>
</html>