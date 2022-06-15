<div>
    <h1 class="text-center text-danger">Résultat de votre recherche</h1>
    <div class="row">
        <?php
        foreach ($results as $annonce){
            ?>
            <div class="col-sm-12 col-lg-4 mt-2">
                <div id="annonce-card" class="card">
                    <img class="card-img-top img-fluid" src="~/<?= $annonce['photo_annonce'] ?>" alt="<?= $annonce['nom_annonce'] ?>" title="<?= $annonce['nom_annonce'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $annonce['nom_annonce'] ?></h5>
                        <p class="card-text"><b>Description :</b></p>
                        <p><?= $annonce['description_annonce'] ?></p>
                        <p><b>Prix : </b><?= $annonce['prix_annonce'] ?> €</p>
                        <p><b>Vendeur : </b><?= $annonce['email_utilisateur'] ?> €</p>
                        <p><b>Catégorie : </b><?= $annonce['type_categorie'] ?> €</p>
                        <p><b>Région : </b><?= $annonce['nom_region'] ?> €</p>
                        <?php
                        if(isset($_SESSION['connecter_user']) && $_SESSION['connecter_user'] === true ){
                            ?>
                            <a href="acheter&id=<?= $annonce['utilisateur_id'] ?>" class="btn btn-info mt-3">Acheter</a>
                            <?php
                        }else{
                            ?>
                            <a href="connexion_utilisateur&id=<?= $annonce['utilisateur_id'] ?>" class="btn btn-info mt-3">Acheter</a>
                            <?php
                        }
                        ?>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#numero&id=<?= $data['id_annonce'] ?>">
                            CONTACT
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="numero&id=<?= $annonce['id_annonce'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">CONTACT VENDEUR</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group active">
                                            <li class="list-group-item">Email : <?= $annonce['email_utilisateur'] ?></li>
                                            <li class="list-group-item">N° de téléphone : <?= $annonce['nom_utilisateur'] ?></li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="email_vendeur&id=<?= $annonce['utilisateur_id'] ?>" class="btn btn-primary mt-3">Message</a>

                        <a target="_blank" href="pdf&id=<?= $annonce['id_annonce'] ?>" class="btn btn-warning mt-3">Annonce en PDF</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>