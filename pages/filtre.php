<?php
    $categories = select_table("fn_categorie_objet", null, null);
?>
<section>
    <form action="model.php" method='get'>
        <div class="mb-3">
            <label for="" class="form-label fw-bold fs-5 text-black">Categories</label>
            <select class="form-select" name="categ" aria-label="Default select example">
                <option value="all">All Categories</option>
                <?php foreach($categories as $category) {?>
                    <option value="<?= $category['id_categorie'] ?>"><?= $category['nom_categorie'] ?></option>
                <?php } ?>
            </select>
        </div>
        <input type="hidden" name="page" value="filtre.php">
        <div class="d-grid gap-2 mb-3">
            <input type="submit" value="Validate" class="fs-5 fw-bold btn btn-primary">
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
    <h2 class="">Object List</h2>
    <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Object name</th>
                    <th scope="col">Return date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list_objet as $objet) { ?>
                    <?php $current_emprunt = get_current_emprunt($objet['id_objet']) ?>
                    <tr>
                        <th scope="row"><?= $objet['nom_objet'] ?></th>
                        <td>
                            <?php if($current_emprunt != null) { ?>
                                <span class="green m-auto">
                                    <?= $current_emprunt['date_retour'] ?>
                                </span>
                            <?php } else { ?>
                                <span class="grisee">
                                    Already returned  
                                </span>
                            <?php } ?>
                        </td>
                        <td><a href="model.php?page=fiche.php&id=<?= $objet['id_objet'] ?>"> Fiche</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</section>