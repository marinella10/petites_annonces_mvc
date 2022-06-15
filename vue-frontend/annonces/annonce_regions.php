<div class="mt-3 container animate__animated animate__backInDown p-3 shadow">
    <div class="row">

        <?php
        foreach ($annonceParRegion as $roow){
        ?>
        <h1 class="mt-3 text-center text-warning">ANNONCES DE LA REGION : <br>
            <b class="text-info text-uppercase"><?= $roowow['nom_region'] ?></b>
        </h1>
        <div class="col-md-12 col-sm-12 mt-3">
            <div class="card"">
            <div class="mt-3 text-center rounded">
                <img width="25%" class="img-fluid" src="~/<?= $roowow['photo_annonce'] ?>" alt="<?= $row['nom_annonce'] ?>" title="<?= $row['nom_annonce'] ?>">
            </div>

            <div class="card-body">
                <h5 class="card-title"><?= $row['nom_annonce'] ?></h5>
                <p class="card-text"><b>Description :</b></p>
                <p><?= $row['description_annonce'] ?></p>
                <p><b>Prix : </b><?= $row['prix_annonce'] ?> €</p>
                <p><b>Catégorie : </b><?= $row['type_categorie'] ?></p>
                <p><b>Nom du vendeur : </b><?= $row['email_utilisateur'] ?></p>
                <p><b>Région : </b><?= $row['nom_region'] ?></p>
                <?php
                $date_depot = new DateTime($row['date_depot']);
                ?>
                <p><em>Date de dépot : <?= $date_depot->format('d-m-Y') ?></em></p>
                <a href="accueil" type="button" class="btn btn-outline-warning mt-3">Retour</a>
                <!--Modal contact vendeur-->
                <!-- Button trigger modal -->
                <a href="email_vendeur?id_user=<?= $roow['utilisateur_id'] ?>" class="btn btn-outline-secondary mt-3">Contacter le vendeur</a>
                <a target="_blank" href="pdf&id_annonce=<?= $roow['id_annonce'] ?>" class="btn btn-outline-danger mt-3">Exporter l'annonce au format PDF</a>
            </div>
        </div>
    </div>

    <?php
    }
    ?>
</div>

