<?php
    $other_condition[] = "ORDER BY nom_categorie ASC"; 
    $categories = select_table("fn_categorie_objet", null, $other_condition);
?>
<section>
    <div class="col-10 m-auto">
        <h2 class="text-center mb-2">Upload image</h2>
        <form action="traitement_upload_object.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label"></label>
                <input type="text" name="nom_objet" class="form-control" id="" placeholder="Object name" required>
            </div>
            <div class="mb-3">
                <label for="">Fichier (image)</label>
                <input type="file" id="" name="nom_image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Categories</label>
                <select class="form-select" name="id_categorie" aria-label="Default select example">
                    <?php foreach($categories as $category) {?>
                        <option value="<?= $category['id_categorie'] ?>"><?= $category['nom_categorie'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" value="Validate" class="btn btn-primary">
            </div>
        </form>
    </div>
</section>