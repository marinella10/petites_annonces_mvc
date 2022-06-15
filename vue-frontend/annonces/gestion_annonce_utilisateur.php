
<div class="bg-annonce-user" style="background-color: #43617f; padding: 20px">

<h4 class="yellow-text">BIENVENUE : <?= $_SESSION['email_utilisateur']; ?></h4>
<h1 class="text-center text-warning mt-3 shadow p-3"> ENDROIT POUR GERER VOS ANNONCES</h1>
<div id="user-dashboard">
    <a href="ajouter_annonce" class="btn btn-success">Ajouter une annonce</a>
    <div class="row mt-3 animate__animated animate__backInDown">
        <?php

        foreach ($annonces as $annonce) {

            ?>
            <div class="col s12 m4">
                <div id="annonce-card" class="card">
                    <div class="card-title">
                        <h4 class="card-title">ANNONCES N° : <?= $annonce['id_annonce'] ?></h4>
                        <h4 class="card-title"><?= $annonce['nom_annonce'] ?></h4>
                    </div>

                    <div class="card-image">
                        <img class="annonce-image" src="image/<?= $annonce['photo_annonce'] ?>"
                             alt="<?= $annonce['nom_annonce'] ?>" title="<?= $annonce['nom_annonce'] ?>">
                    </div>

                    <div class="card-content">

                        <p><b class="text-info">Prix : </b><?= $annonce['prix_annonce'] ?> €</p>
                        <p><b class="text-info">Catégorie : </b><?= $annonce['type_categorie'] ?></p>
                        <p><b class="text-info">Nom du vendeur : </b><?= $annonce['email_utilisateur'] ?></p>
                        <p><b class="text-info">Région : </b><?= $annonce['nom_region'] ?></p>
                        <div class="card-action center">
                            <a href="details-annonce-visiteur&id_details=<?= $annonce['id_annonce'] ?>" class="btn btn-outline-success mt-2">Détails de l' annonce</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
