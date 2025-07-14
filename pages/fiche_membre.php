<?php

?>
<section class="d-md-flex justify-content-center gap-3">
        <div class="card d-md-flex justify-content-center gap-3">
            <img src="" class="card-img-top image" alt="Images">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="fw-medium">Name : </span><?= $_SESSION['current_user']['nom'] ?></li>
                <li class="list-group-item"><span class="fw-medium">Birthday : </span><?= $_SESSION['current_user']['birth_date'] ?></li>
                <li class="list-group-item"><span class="fw-medium">Email : </span><?= $_SESSION['current_user']['email'] ?></li>
                <li class="list-group-item"><span class="fw-medium">City : </span><?= $_SESSION['current_user']['ville'] ?></li>
            </ul>
        </div>

        <!-- historics card -->
        <?php $history_emprunt = get_emprunt_by_membre($_SESSION['current_user']['id_membre']); ?>
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
                                <th class="fs-5 fw-medium">Etat</th>
                                <th class="fs-5 fw-medium">Return</th>
                            </tr>
                            <?php foreach ($history_emprunt as $item) { ?>
                                <tr>
                                    <td class="table-line"><?= get_objet($item['id_objet'])['nom_objet'] ?></td>
                                    <td class="table-line"><?= $item['date_emprunt'] ?></td>
                                    <td class="table-line"><?= $item['date_retour'] ?></td>
                                    <?php if(verif_emprunt_return($item['id_emprunt']) == 1) { ?>
                                        <td class="table-line">
                                            <form action="#" method='post'>
                                                <select name="etat" id="">
                                                    <option value="ok">OK</option>
                                                    <option value="abimer">A BIMER</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="table-line"></td>
                                    <?php } else { ?>
                                        <td></td>
                                        <td class="table-line"><span class="green m-auto">Returned</span></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </li>
            </ul>
        </div>

</section>