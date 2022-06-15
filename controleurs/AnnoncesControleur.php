<?php
//Appel du modele
require_once "../modeles-backend/Annonces_backend.php";

//fonction afficher toue les annonces pour les visitaurs
//cette fonction est appelée dans le retour quand la route === accueil

function afficherAnnonces(){
    //instance de la classe anonce
    $annonceClasse = new Annonces();
    //Appel de la methode = requete SQL
    $annonces = $annonceClasse->afficherToutesAnnonces();
    //Apeller la vue
    require_once "../vue-frontend/accueil.php";
    return $annonces;
}

/////////////////////////AFFICHER LES ANNONCES PAR UTILISATEUR//////////////////
function afficherAnnoncesParUtilisateur()
{
    //Instance de la classe
    $annoncesClasse = new \modeles-backend\Annonces_backend();
    $annonces = $annoncesClasse->afficheAnnoncesTableauDeBordUtilisateur();
    require_once "../vues/Utilisateurs/gestion_annonces_utilisateur.php";
    return $annonces;
}


////////////////
////////////////RECHREHCE PAR MOT CLE//////////

//Cette fonction est appelée par le routeur au clic sur le bouton du formulaire de recherche
function rechercheGlobalMotCle()
{
    //On creer une copie du modele (Instance de la classe Annonces)
    $annoncesClasse = new Annonces();
    //On appel la methode (fonction dans une classe) rechercheAnnonceMotCle() qui est dans la classe annonces
    $resultat = $annoncesClasse->rechercheAnnonceMotCle();
    //On cache le contenu de la page d'accueil
    ?>
    <style>
        #afficherannonce{
            display: none;
        }
    </style>
<?php
    //$resultat est le resultat de la requète SQL de la methode rechercheAnnonceMotCle()
//Comme les resultat son mutiple (tableau associatif) on utilise une boucle de lecture foreach
//On affiche tous les resultats a la place du contenu de fonction afficherAnnonces()
    foreach ($resultat as $annonce) {
        ?>
        }
        <div class="col s12 m4">
            <div id="annonce-card" class="card">
                <div class="card-title">
                    <h4 class="card-title">ANNONCES N° : <?= $annonce['id_annonce'] ?></h4>
                    <h4 class="card-title"><?= $annonce['nom_annonce'] ?></h4>
                </div>

                <div class="card-image">
                    <img style="width: 25%" class="annonce-image" src="assets/<?= $annonce['photo_annonce'] ?>"
                         alt="<?= $annonce['nom_annonce'] ?>" title="<?= $annonce['nom_annonce'] ?>">
                </div>

                <div class="card-content">

                    <p><b class="text-info">Prix : </b><?= $annonce['prix_annonce'] ?> €</p>
                    <p><b class="text-info">Catégorie : </b><?= $annonce['type_categorie'] ?></p>
                    <p><b class="text-info">Nom du vendeur : </b><?= $annonce['email_utilisateur'] ?></p>
                    <p><b class="text-info">Région : </b><?= $annonce['nom_region'] ?></p>
                    <div class="card-action center">
                        <a href="details-annonce-visiteur&id_details=<?= $annonce['id_annonce'] ?>"
                           class="btn btn-outline-success mt-2">Détails de l' annonce</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


    return $resultat;
}


