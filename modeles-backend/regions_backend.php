<?php

require_once "../modeles-backend/Database_backend.php";

class Regions extends Database
{
    private $id_regions;
    private $nom_region;

    public function afficherToutesRegions(){
        $db = $this->getPDO();
        $sql = "SELECT * FROM regions";
        $stmt = $db->query($sql);
        return $stmt;
    }

    public function afficherAnnonceParRegion($id){
        //Afficher les détails de l'annonce par regions
        $db = $this->getPDO();
        $sql = "SELECT *  FROM annonces  
                INNER JOIN utilisateurs ON annonces.utilisateur_id = utilisateurs.id_utilisateur 
                INNER JOIN  categories ON annonces.categorie_id = categories.id_categorie 
                INNER JOIN regions ON annonces.regions_id = regions.id_regions
                WHERE regions_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id));
        $getRegion = $stmt->fetchAll();
        return $getRegion;

    }

}