<!--BLOC DE RECHERCHE-->
<div class="mt-3 container animate__animated animate__backInDown shadow">
    <div class="text-center">
        <img src="image/logo2.jpg" alt="petite-annonce.com" title="petite-annonce.com">
        <h3 class="text-secondary">
            Des millions de petites annonces et autant d’occasions de se faire plaisir
        </h3>
    </div>
    <!--CARTE DE FRANCE-->
    <div class="text-center pt-5">
    <div id="carte-accueil" class="row">
        <div class="col s12 m12 l12 center-align">
            <h2 class="text-primary">VOTRE REGION</h2>
            <link rel="stylesheet" href="carte/style.css">
            <script src="carte/jquery-1.11.1.min.js"></script>
            <script src="carte/France-map.js"></script>
            <script>
                francefree();
            </script>
        </div>
    </div>
    </div>

    <!--FIN CARTE FRANCE-->


<!-- AFFICHER ANNONCES RANDOM -->

<div class="text-center pt-5">
    <!--Le formulaire de recherche par mot cle-->
    <h3 class="text-primary pt-3">RECHERCHER UNE ANNONCES</h3>
    <!--Formulaire methode post permet l'utilisation de la super Globale $_POST['attribut name']-->
    <form method="post">
        <!--$_POST['recherche'] est utilisé dans le modele pour la requète SQL-->
        <input type="search" class="input-field mt-3" placeholder="Rechercher" name="recherche" required>
        <!--$_POST['btn-search-text'] est utilisé dans le router pour appeler la fonction du controleur qui appel la methode du modele-->
        <button type="submit" class="btn green text-warning" name="btn-search-text"> <strong>Rechercher</strong></button>
    </form>




    <div class="row">
    <div class="text-center">
        <h2 class="text-primary pt-5 p-4">NOS ANNONCES</h2>
    </div

        <div id="afficherannonce">

        <?php
        //On parcours les resultats à l'aide d'une boucle foreach et un alias pour les annonces dispo
        foreach ($annonces as $annonce) {
            //creer une variable qui stocke une copie (instance) de la classe native PHP
            $date = new DateTime($annonce['date_depot'])
        ?>
        <div class="col-md-4">

            <div class="text-center" >
            <h4 class="card-title text-warning">ANNONCE N° : <?= $annonce['id_annonce'] ?></h4
            <h1><?= $annonce['nom_annonce'] ?></h1>
            </div>

            <img src="<?= $annonce['photo_annonce'] ?>" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <div class="text-center" >
                <p><b class="text-info">Prix : </b><?= $annonce['prix_annonce'] ?> €</p>
                <p><b class="text-info">Date:  </b><?= $date->format("d/m/Y") ?>
                <p><b class="text-info">Catégorie : </b><?= $annonce['type_categorie'] ?></p>
                <p><b class="text-info">Nom du vendeur : </b><?= $annonce['email_utilisateur'] ?></p>
                <p><b class="text-info">Régions : </b><?= $annonce['nom_region'] ?></p>
                <div class="card-action">
                    <a href="details-annonce-visiteur&id_details=<?= $annonce['id_annonce'] ?>"
                       class="btn btn-outline-info mt-2">Détails de l' annonce</a>
                    </div>
                </div>
            </div>
        </div>
            <?php
        }
        ?>
    </div>
</div>
    </div>


