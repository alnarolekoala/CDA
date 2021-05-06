<div class="container">
    <div class="row mt-5">
        <div class="col-sm-12">
            <h1>Ajout</h1>
        </div>
    </div>

    <?php
    var_dump(__DIR__);
    if (!empty($success)) {
        ?>
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <a href="/Discs/index" title="retour à l'accueil" class="btn btn-secondary">Retour</a>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="/Discs/createDisc/" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Titre :</label>
                    <input type="text" class="form-control" id="title" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>" name="title">
                    <span class="error" id="errorModel"><?= isset($error['title']) ? '* ' . $error['title'] : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre :</label>
                    <input type="text" class="form-control" id="genre" value="<?= isset($_POST['genre']) ? $_POST['genre'] : '' ?>" name="genre">
                    <span class="error"><?= isset($error['genre']) ?  '* ' .$error['genre'] : '' ?></span>
                </div>




                <div class="mb-3">
                    <label for="label" class="form-label">Label :</label>
                    <input type="text" class="form-control" id="label" value="<?= isset($_POST['label']) ? $_POST['label'] : '' ?>" name="label">
                    <span class="error"><?= isset($error['label']) ?  '* ' .$error['label'] : '' ?></span>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Year :</label>
                    <input type="text" class="form-control" id="year" value="<?= isset($_POST['year']) ? $_POST['year'] : '' ?>" name="year">
                    <span class="error"><?= isset($error['year']) ?  '* ' .$error['year'] : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prix :</label>
                    <input type="text" class="form-control" id="price" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>" name="price">
                    <span class="error"><?= isset($error['price']) ?  '* ' .$error['price'] : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="artist" class="form-label">Artiste :</label>
                    <select class="form-select" aria-label="Default select example" id="artist" name="artist">
                        <option selected disabled>Sélectionnez un artiste</option>
                        <?php
                        foreach ($artists as $artist) {
                            ?>
                            <option value="<?= $artist->id ?>"><?= $artist->artist_name ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="error"><?= isset($error['artist']) ?  '* ' .$error['artist'] : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="picture"class="form-label">Picture :</label>
                    <input type="file" class="form-control-file" name="picture" id="picture">
                    <span class="error"><?= isset($error['picture']) ? $error['picture'] : '' ?></span>
                </div>
                <button type="submit" class="btn btn-primary" name="add" value="add">Ajouter</button>
            </form>
        </div>
    </div>
</div>