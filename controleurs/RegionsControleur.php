<?php
//Appel du modele (classe) regions
require_once "../modeles-backend/regions_backend.php";


function annoncesParRegion($id){
    //Instance du modele (de la classe)
    $regionClasse = new Regions();
    //Recuperation de l'id passer dans URL par java script
    $id = $_GET['id'];
    //Appel de la methode de la classe region (requète SQL)
    $region = $regionClasse->afficherAnnonceParRegion($id);
    //Si la equète retourne un resultat
    if($region){
        //On appel le fichier de la vues
        require_once "../vue-frontend/annonce_region.php";
    }else{
        //Sinon pas d'annonce pour cette region
        echo "<p class='red white-text' style='padding: 20px'>Pas d'annonces pour cette regions</p>";
    }

}

function listerRegions(){
    $region = new Regions();
    $afficher_region = $region->afficherToutesRegions();
    ?>
    <option class="text-success" value="">Choix de la région</option>
    <?php
    foreach ($afficher_region as $reg){
        ?>
        <option value="<?= $reg['id_regions'] ?>"><?= $reg['nom_region'] ?></option>
        <?php
    }
    return $afficher_region;
}