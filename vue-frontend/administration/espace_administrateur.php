<div class="container-fluid">
    <div class="row" id="haut">
        <div class="col-md-2 col-sm-12 animate__animated animate__backInLeft">
            <ul class="mt-3 list-group">
                <li class="list-group-item active">
                    <a id="utilisateurs" href="#users">UTILISATEURS</a>
                </li>
                <li class="list-group-item">
                    <a  href="#annonces">ANNONCES</a>
                </li>
                <li class="list-group-item">
                    <a  href="#regions">REGIONS</a>
                </li>
                <li class="list-group-item">
                    <a href="#categories">CATEGORIES</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 col-sm-12 animate__animated animate__backInRight">
            <div class="mt-3 p-5" id="users">
                <h3 class="text-warning">TABLE DES UTILISATEURS & ADMINISTRATEURS :</h3>
                <a href="ajouter_administrateur" class="btn btn-outline-success">Ajouter un administrateur</a>
                <table class="table table-info table-striped mt-3">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th>Role</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($tableAdmin as $admin){
                        ?>
                        <tr>
                            <td><?= $admin['id_utilisateur'] ?></td>
                            <td><?= $admin['email_utilisateur'] ?></td>
                            <td><?= $admin['password_utilisateur'] ?></td>
                            <td class="text-warning fw-bold"><?= $admin['role'] ?></td>
                            <!-- MODAL SUPPRIMER -->
                            <td>
                                <!-- Button trigger modal -->
                                <a class="btn btn-danger" href="supprimer_administrateur?id_admin=<?= $admin['id_utilisateur'] ?>">
                                    Supprimer
                                </a>


                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <!--TABLE ANNONCES-->
            <div class="mt-3 p-5" id="annonces">

                <h3 class="text-warning">TABLE DES ANNONCES :</h3>
                <table id="tableAnnonce" class="table table-warning table-striped mt-3">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom annonce</th>
                        <th>Description annonce</th>
                        <th>Prix annonce</th>
                        <th>Photo annonce</th>
                        <th>Date dépot annonce</th>
                        <th>Catégorie annonce</th>
                        <th>Propriétaire annonce</th>
                        <th>Région annonce</th>
                        <th>Supprimer annonce</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($tableAnnonce as $admin){
                        ?>
                        <tr>
                            <td><?= $admin['id_annonce'] ?></td>
                            <td><?= $admin['nom_annonce'] ?></td>
                            <td><?= $admin['description_annonce'] ?></td>
                            <td><?= $admin['prix_annonce'] ?></td>
                            <td><img width="100%" src="<?= $admin['photo_annonce'] ?>" alt="<?= $admin['nom_annonce'] ?>" title="<?= $admin['nom_annonce'] ?>"/></td>
                            <td><?= $admin['date_depot'] ?></td>
                            <td><?= $admin['type_categorie'] ?></td>
                            <td><?= $admin['email_utilisateur'] ?></td>
                            <td><?= $admin['nom_region'] ?></td>
                            <!-- MODAL SUPPRIMER -->
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimer_annonce_admin&id_suppr=<?= $admin['id_annonce'] ?>">
                                    Supprimer
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3 p-5" id="regions">
                <h3 class="text-warning">TABLE DES REGIONS :</h3>
                <table id="tableRegion" class="table table-success table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom de la région</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($tableRegion as $annonce){
                        ?>
                        <tr>
                            <td>ID: <?= $annonce['id_regions'] ?></td>
                            <td><?= $annonce['nom_region'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3 p-5" id="categories">
                <h3 class="text-warning">TABLE DES CATEGORIES :</h3>
                <a href="ajouter_categorie" class="btn btn-success mt-3 mb-3">Ajouter une catégorie</a>
                <table id="tableCategorie" class="table table-primary table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Type de catégories</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($tableCategorie as $annonce){
                        ?>
                        <tr>
                            <td>ID: <?= $annonce['id_categorie'] ?></td>
                            <td><?= $annonce['type_categorie'] ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#supprimer_categorie_admin&id_suppr=<?= $data['id_categorie'] ?>">
                                    Supprimer
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <a href="#haut" class="btn btn-outline-warning">Retour en haut de page</a>
        </div>
    </div>
</div>