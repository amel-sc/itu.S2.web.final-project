<?php
    $categories = select_table("fn_categorie_objet", null, null);
?>
<section>
    <form action="model.php" method='get'>
        <div class="mb-3">
            <label for="" class="form-label">Categories</label>
            <select class="form-select" name="categ" aria-label="Default select example">
                <option value="all">All Categories</option>
                <?php foreach($categories as $category) {?>
                    <option value="<?= $category['id_categorie'] ?>"><?= $category['nom_categorie'] ?></option>
                <?php } ?>
            </select>
        </div>
        <input type="hidden" name="page" value="filtre.php">
        <div class="d-grid gap-2 mb-3">
            <input type="submit" value="Validate" class="btn btn-primary">
        </div>
    </form>
</section>
<section>
    <?php  if(isset($_GET['categ'])) { 
        $cat = $_GET['categ'];
        $value = array();
        $value[] = array('key' => 'id_categorie', 'value' => $cat);
        if($cat == "all") {
            $list_objet = select_table("fn_objet", null, null);
        } else {
            $list_objet = select_table("fn_objet", $value, null);
        }
    ?>
    <table class="table table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">Object name</th>
                <th scope="col">Return date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_objet as $objet) { ?>
                <?php $current_emprunt = get_current_emprunt($objet['id_objet']) ?>
                <tr>
                    <th scope="row"><?= $objet['nom_objet'] ?></th>
                    <td>
                        <?php if($current_emprunt != null) { ?>
                            <?= $current_emprunt['date_retour'] ?>
                        <?php } else { ?>
                            Already returned  
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
</section>