<?php
    // list object
    $list_objet = select_table("fn_objet", null, null)
?>

<section>
    <h2 class="text-primary">Object List</h2>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th scope="col">Object name</th>
                    <th scope="col">Return date</th>
                    <th scope="col">Emprunt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list_objet as $objet) { ?>
                    <?php $current_emprunt = get_current_emprunt($objet['id_objet']) ?>
                    <tr>
                        <td><a href="model.php?page=fiche.php&id=<?= $objet['id_objet'] ?>"> <?= $objet['id_objet'] ?></a></td>
                        <th scope="row"><?= $objet['nom_objet'] ?></th>
                        <td>
                            <?php if($current_emprunt != null) { ?>
                                <span class="green m-auto">
                                    disponible le <?= $current_emprunt['date_retour'] ?>
                                </span>
                            <?php } else { ?>
                                <span class="grisee">
                                    disponible  
                                </span>
                            <?php } ?>
                        </td>
                        <td>
                            <!-- button to change department -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDayNumber">
                                Emprunt object
                            </button>
                        </td>
                        <section>
                            <div class="modal fade" id="addDayNumber"> data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Change departement</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="traitement_emprunt.php" autocomplete="off" method="get">
                                            <div class="modal-body">
                                            <!-- date type day -->
                                            <div class="mb-3">
                                                <label for="id_day_number">Day number</label>
                                                <input type="number" name="day_number" id="id_day_number" class="form-control" required>
                                            </div>
                                            <input type="hidden" name="id_objet" value="<?= $objet['id_objet'] ?>">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Validate</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
