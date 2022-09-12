<div class="container w-25 animate__animated animate__backInDown">
    <h1 class="text-success">Annonce numéro : <?= $details['id_annonce'] ?></h1>
    <div id="annonce-card" class="card">
        <img width="30%"  class="" src="~/<?= $details['photo_annonce'] ?>"
             alt="<?= $details['nom_annonce'] ?>" title="<?= $details['nom_annonce'] ?>">
        <div class="card-body">
            <h3 class="card-title text-danger"><?= $details['nom_annonce'] ?></h3>
            <p class="card-text"><b>Description :</b></p>
            <p><?= $details['description_annonce'] ?></p>
            <p><b class="text-info">Prix : </b><?= $details['prix_annonce'] ?> €</p>
            <p><b class="text-info">Catégorie : </b><?= $details['type_categorie'] ?></p>
            <p><b class="text-info">Nom du vendeur : </b><?= $details['email_utilisateur'] ?></p>
            <p><b class="text-info">Région : </b><?= $details['nom_region'] ?></p>
            <?php
            $date_depot = new DateTime($details['date_depot']);
            ?>
            <p><b class="text-info">Date de dépot : <?= $date_depot->format('d-m-Y') ?></b></p>
            <a class="my-5 btn btn-outline-danger" href="accueil">RETOUR</a>
        </div>
    </div>
</div>