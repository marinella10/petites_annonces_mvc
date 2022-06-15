<div class="container w-25 animate__animated animate__backInDown">
    <h1 class="text-success">Annonce numéro: <?= $details['id_annonce'] ?></h1>
    <div id="annonce-card" class="card">
        <div class="mt-3 text-center">
            <img width="50%"  class="" src="~/<?= $details['photo_annonce'] ?>" alt="<?= $details['nom_annonce'] ?>" title="<?= $details['nom_annonce'] ?>">
        </div>

        <div class="card-body">
            <h5 class="card-title"><?= $details['nom_annonce'] ?></h5>
            <p class="card-text"><b>Description :</b></p>
            <p><?= $details['description_annonce'] ?></p>
            <p><b>Prix : </b><?= $details['prix_annonce'] ?> €</p>
            <p><b>Catégorie : </b><?= $details['type_categorie'] ?></p>
            <p><b>Nom du vendeur : </b><?= $details['email_utilisateur'] ?></p>
            <p><b>Région : </b><?= $details['nom_region'] ?></p>
            <?php
            $date_depot = new DateTime($details['date_depot']);
            ?>
            <p><em>Date de dépot : <?= $date_depot->format('d-m-Y') ?></em></p>
            <a href="accueil" type="button" class="btn btn-outline-warning mt-3">Retour</a>
            <!--Modal contact vendeur-->
            <!-- Button trigger modal -->
            <a href="email_vendeur?id_user=<?= $details['utilisateur_id'] ?>" class="btn btn-outline-secondary mt-3">Contacter le vendeur</a>
            <a target="_blank" href="pdf&id_annonce=<?= $details['id_annonce'] ?>" class="btn btn-outline-danger mt-3">Exporter l'annonce au format PDF</a>
        </div>
    </div>
</div>
