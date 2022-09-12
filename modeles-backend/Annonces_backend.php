<?php

require_once "../modeles-backend/Database_backend.php";


/////RECUPERER TOUTES LES ANNONCES POUR LES VISITEURS//////////////

class Annonces extends Database {


    public function afficherToutesAnnonces(){
        $db = $this->getPDO();
        $sql = "SELECT * FROM annonces
        INNER JOIN utilisateurs ON annonces.utilisateur_id = utilisateurs.id_utilisateur
                INNER JOIN categories ON annonces.categorie_id = categories.id_categorie
                INNER JOIN regions ON annonces.region_id = regions.id_regions ORDER BY Rand() DESC";
        //On stock le resultat de requète dans une variable $annonces
        $annoncesModel = $db->query($sql);
       // var_dump($annoncesModel);
        return $annoncesModel;
    }



//////////////////////////AFFICHER LES ANNONCES PAR UTILISATEUR////////////////
///
public function afficheAnnoncesTableauDeBordUtilisateur(){
    //la connexion a PDO MuSQL via la classe mere et la methode getPDO
    $db = $this->getPDO();

    //La requete SQL
    $sql = "SELECT * FROM annonces WHERE utilisateur_id = ?";
    //recuperer la session id_utilisateur
    $this->id_utilisateur = $_SESSION['id_utilisateur'];
    //requte preparée
    $requete = $db->prepare($sql);
    //Lié le paramètre
    $requete->bindParam(1, $this->id_utilisateur);
    $requete->execute();
    return $requete->fetchAll();
}


/// Afficherdetailuneannonce///
///
    public function afficherDetailsUneAnnonce(){
        //Coonexion PDO
        $db = $this->getPDO();
$sql = "SELECT * FROM annonces 
                INNER JOIN utilisateurs ON annonces.utilisateur_id = utilisateurs.id_utilisateur 
                INNER JOIN categories ON annonces.categorie_id = categories.id_categorie 
                INNER JOIN regions ON annonces.regions_id = regions.id_regions 
                WHERE id_annonce = ?";
    //Recup de id utilisateur
$this->id_annonce = $_GET['id_details'];
    //Requète préparée
$request = $db->prepare($sql);
    //Lié les paramètres
$request->bindParam(1, $this->id_annonce);



    }

//////////////////////////RECHERCHE PAR MOT CLE////////////////
public function rechercheAnnonceMotCle(){
    //Connexion a phpMyAdmin via la methode getPDO de la classe mere Database
    $db = $this->getPDO();
    //On stock dans une variable le champs input du formulaire de recherche
    //NOTE : ici le modele a acces au formulaire de accueil.php car cette vue est appelée avant dans la
    //fonction afficherAnnonces() du controleur
    $recherche = $_POST['recherche'];
    //test de debug
    var_dump($recherche);
    //La requète SQL
    //https://sql.sh/cours/where/like
    /*
     * L’opérateur LIKE est utilisé dans la clause WHERE des requêtes SQL.
     * Ce mot-clé permet d’effectuer une recherche sur un modèle particulier.
     *  Il est par exemple possible de rechercher les enregistrements dont
     * la valeur d’une colonne commence par telle ou telle lettre.
     * Les modèles de recherches sont multiple.
     */
    $sql = "SELECT * FROM annonces
                INNER JOIN utilisateurs ON annonces.utilisateur_id = utilisateurs.id_utilisateur 
                INNER JOIN  categories ON annonces.categorie_id = categories.id_categorie 
                INNER JOIN regions ON annonces.region_id = regions.id_regions 
                WHERE nom_annonce LIKE '%$recherche%'
                OR description_annonce LIKE '%$recherche%'
                OR prix_annonce LIKE '%$recherche%'
                OR type_categorie LIKE '%$recherche%'";

    //on stock le resultat de la requète dans une variable
    $res = $db->query($sql);
    //Si il y a des resultats
    if($res){
        //Debug + retour de la variable qui stock le resultat de recherche
        var_dump($res);
        return $res;

    }else{
        //Sinon on affiche des erreurs
        ?>
        <p class="red white-text" style="padding: 20px">AUCUN RESULTAT POUR VOTRE RECHERCHE</p>
        <?php
    }

}
}


