<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>ajout</title>
</head>
<body>
  
    <?php 
    require "../BDD/connexion_BDD.php";
    $requete = $db->query("SELECT artist_name FROM artist");
    ?>
       <h1 class="offset-2 col-10"> Ajouter un vinyle</h1>
    
<div class='container'>
    <form action="add_script.php" onsubmit="return check(this)" id="ajoutForm" method="POST" enctype="multipart/form-data" class="col-12">
        <div class="row">
            <div class="form-group col-12">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" value="<?php if(isset($_GET['title'])) {echo $_GET['title']; } ?>">
                <?php if( ! empty( $_GET['erreur0'] ) )?><p class="erreurs" id="MsgErreur0"><?= $_GET['erreur0'];?></p>
                
            </div>
            <div class="form-group col-12">
                <label for="artist">Artist</label>
                <select class="form-control" id="artist" name="artist">
                    
                <?php
                while ($ligne = $requete->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <option><?= $ligne->artist_name?> </option>
                    <?php
                }
                ?>
                </select>
            
            </div> 
            <div class="form-group col-12">
                <label for="annee">Year</label>
                <input type="text" class="form-control" id="annee" name="annee" aria-describedby="emailHelp" placeholder="Enter year" value="<?php if(isset($_GET['annee'])) {echo $_GET['annee']; } ?>">
                <?php if( ! empty( $_GET['erreur1'] ) )?><p class="erreurs" id="MsgErreur1"><?= $_GET['erreur1'];?></p>
            </div>
            <div class="form-group col-12">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" placeholder="Enter genre (Rock, Pop, Prog ...)" value="<?php if(isset($_GET['genre'])) {echo $_GET['genre']; } ?>">
                <?php if( ! empty( $_GET['erreur2'] ) )?><p class="erreurs" id="MsgErreur2"><?= $_GET['erreur2'];?></p>
            </div>
            <div class="form-group col-12">
                <label for="label">Label</label>
                <input type="text" class="form-control" id="label" name="label" aria-describedby="emailHelp" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale ...)" value="<?php if(isset($_GET['label'])) {echo $_GET['label']; } ?>">
                <?php if( ! empty( $_GET['erreur3'] ) )?><p class="erreurs" id="MsgErreur3"><?= $_GET['erreur3'];?></p>
            </div>
            <div class="form-group col-12">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="" value="<?php if(isset($_GET['price'])) {echo $_GET['price']; } ?>">
                <?php if( ! empty( $_GET['erreur4'] ) )?><p class="erreurs" id="MsgErreur4"><?= $_GET['erreur4'];?></p>
            </div>
            <div class="form-group col-12">
                <label for="picture">Picture</label>
                <input type="file" class="form-control-file" name="picture" id="picture">
                <?php if( ! empty( $_GET['erreur5'] ) )?><p class="erreurs" id="MsgErreur5"><?= $_GET['erreur5'];?></p>
            </div>
            <div> 
                <button type="submit" id="ajoute" class="btn btn-primary">Ajouter</button>
                <a href="indexCRUD.php"><button type="button" id="back" class="btn btn-primary">Retour</button></a>
            </div>
        </div>
    </form>
</div>

<script src="JS/add_script.js"></script>

</body>
</html>