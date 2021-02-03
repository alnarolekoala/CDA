<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <h1 class="offset-2 col-10"> Ajouter un vinyle</h1>
    <?php 
    require "../BDD/connexion_BDD.php";
    $requete = $db->query("SELECT artist_name FROM artist");
    ?>
     
    
<div class='container'>
    <form action="add_script.php" method="POST" enctype="multipart/form-data" class="col-12">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" value="<?php if(isset($_GET['title'])) {echo $_GET['title']; } ?>">
            <?php if( ! empty( $_GET['erreur0'] ) ) echo '    <p>', $_GET['erreur0'], '</p><style>#ref {border-color:red;}</style>' ?>
        </div>
        <div class="form-group">
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
        <div class="form-group">
            <label for="annee">Year</label>
            <input type="text" class="form-control" id="annee" name="annee" aria-describedby="emailHelp" placeholder="Enter year" value="<?php if(isset($_GET['annee'])) {echo $_GET['annee']; } ?>">
            <?php if( ! empty( $_GET['erreur1'] ) ) echo '    <p>', $_GET['erreur1'], '</p><style>#ref {border-color:red;}</style>' ?>
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="Enter genre (Rock, Pop, Prog ...)" value="<?php if(isset($_GET['genre'])) {echo $_GET['genre']; } ?>">
            <?php if( ! empty( $_GET['erreur2'] ) ) echo '    <p>', $_GET['erreur2'], '</p><style>#ref {border-color:red;}</style>' ?>
        </div>
        <div class="form-group">
            <label for="label">Label</label>
            <input type="text" class="form-control" id="label" name="label" aria-describedby="emailHelp" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale ...)" value="<?php if(isset($_GET['label'])) {echo $_GET['label']; } ?>">
            <?php if( ! empty( $_GET['erreur3'] ) ) echo '    <p>', $_GET['erreur3'], '</p><style>#ref {border-color:red;}</style>' ?>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="" value="<?php if(isset($_GET['price'])) {echo $_GET['price']; } ?>">
            <?php if( ! empty( $_GET['erreur4'] ) ) echo '    <p>', $_GET['erreur4'], '</p><style>#ref {border-color:red;}</style>' ?>
        </div>
        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" class="form-control-file" name="picture" id="picture">
            <?php if( ! empty( $_GET['erreur5'] ) ) echo '    <p>', $_GET['erreur5'], '</p><style>#ref {border-color:red;}</style>' ?>
        </div>
        <div> <button type="submit" id="ajoute" class="btn btn-primary">Ajouter</button>
        <a href="indexCRUD.php"><button type="button" id="back" class="btn btn-primary">Retour</button></a>
        </div>

    </form>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>