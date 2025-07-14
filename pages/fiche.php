<?php 
    $objet = get_objet($_GET['id']);
?>
<section>
    <div class="fiche d-flex">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text"><b>Nom : </b> <?= $objet['nom_objet']?></p>
            </div>
        </div>
    </div>

</section>