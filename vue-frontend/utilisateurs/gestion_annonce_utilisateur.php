<h1 class="text-center text-warning mt-3 shadow p-3">GESTION DE VOS ANNONCES</h1>
<div id="user-dashboard">
    <a href="ajouter_annonce" class="btn btn-success">Ajouter une annonce</a>
    <div class="row mt-3 animate__animated animate__backInDown">
        <?php

        foreach ($annonceParUtilisateur as $annonce) {

        ?>
        <div class="col-sm-12 col-lg-4 mt-2">
            <div id="annonce-card" class="card shadow">
                <img class="card-img-top img-fluid" src="~/<?= $annonce['photo_annonce'] ?>"
                     alt="<?= $data['nom_annonce'] ?>" title="<?= $annonce['nom_annonce'] ?>">
                <div class="card-body">
                    <h5 class="card-title text-warning"><?= $annonce['nom_annonce'] ?></h5>
                    <p class="card-text text-info"><b>Description :</b></p>
                    <p><?= $annonce['description_annonce'] ?></p>
                    <p><b class="text-info">Prix : </b><?= $annonce['prix_annonce'] ?> €</p>
                    <p><b class="text-info">Catégorie : </b><?= $annonce['type_categorie'] ?></p>
                    <p><b class="text-info">Nom du vendeur : </b><?= $annonce['email_utilisateur'] ?></p>
                    <p><b class="text-info">Région : </b><?= $annonce['nom_region'] ?></p>
                    <?php
                    $date_depot = new DateTime($data['date_depot']);
                    ?>
                    <p><b class="text-info">Date de dépot : <?= $date_depot->format('d-m-Y') ?></b></p>

                    <a href="supprimer_annonce&id_suppr=<?= $annonce['id_annonce'] ?>" type="button" class="btn btn-outline-danger">Supprimer cette annonce</a>

                    <a class="mt-2 btn btn-outline-primary" href="editer_annonce&id_details=<?= $annonce['id_annonce'] ?>">Editer cette annonce</a>

                    <a href="details_annonce&id_details=<?= $annonce['id_annonce'] ?>" class="mt-2 btn btn-outline-success">Détails de l' annonce</a>


                </div>
            </div>
        </div>
<?php
}
