<?php
    // list object
    $list_objet = select_table("fn_objet", null, null)
?>

<section>
    <div class="table-responsive">
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
    </div>
</section>