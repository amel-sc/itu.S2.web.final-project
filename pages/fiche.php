<?php 
    $objet = get_objet($_GET['id']);
?>
<section class="d-md-flex justify-content-center gap-3">
        <div class="card d-md-flex justify-content-center gap-3">
            <?php $principal_image = get_first_image($objet['id_objet']); ?>
            <img src="<?= $principal_image['nom_image'] ?>" class="card-img-top image" alt="Images">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="fw-medium">Obejct name : </span><?= $objet['nom_objet'] ?></li>
                <li class="list-group-item"><span class="fw-medium">Category name : </span><?= $objet['nom_categorie'] ?></li>
                <li class="list-group-item"><span class="fw-medium">Membre name : </span><?= $objet['nom'] ?></li>
            </ul>
        </div>

        <!-- historics card -->
        <?php $history_emprunt = get_emprunt_by_objet($objet['id_objet']); ?>
        <div class="card col-md-7 h-100" style="">
            <div class="card-header">
                <h5 class="card-title m-0">Historics</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p class="fw-medium m-0">Emprunt history</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr class="table-dark">
                                <th class="fs-5 fw-medium">Objet</th>
                                <th class="fs-5 fw-medium">Emprunt date</th>
                                <th class="fs-5 fw-medium">Return date</th>
                            </tr>
                            <?php foreach ($history_emprunt as $item) { ?>
                                <tr>
                                    <td class="table-line"><?= $objet['nom_objet'] ?></td>
                                    <td class="table-line"><?= $item['date_emprunt'] ?></td>
                                    <td class="table-line"><?= $item['date_retour'] ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </li>
            </ul>
        </div>
</section>