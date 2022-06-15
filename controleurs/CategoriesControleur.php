<?php
require_once "../modeles-backend/Categories_backend.php";

//Fonction a appeler depuis la vue ajouter_annonces.php

function afficherToutesCategories(){
    $categorie = new Categories();
    $listeCategorie = $categorie->afficherCategorie();
    ?>
    <option class="text-success"  value="">Choix de la catégories</option>
    <?php
    foreach ($listeCategorie as $cat){
        ?>
        <option value="<?= $cat['id_categorie'] ?>"><?= $cat['type_categorie'] ?></option>
        <?php
    }
    return $listeCategorie;
}
