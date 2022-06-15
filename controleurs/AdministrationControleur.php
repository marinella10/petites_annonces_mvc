<?php
//Appel des modeles

require_once "../modeles-backend/Utilisateur_backend.php";
require_once "../modeles-backend/administration_backend.php";

//Inscrire un administrateur
function inscriptionAdmin(){
    $inscription = new Administration();
    if(isset($_POST['btn-valide-inscription-admin'])){
        if(isset($_POST['email_admin']) && !empty($_POST['email_admin']) && isset($_POST['password_admin']) && !empty($_POST['password_admin'])){
            if($_POST['password_admin'] === $_POST['password_repeter']){
                $inscription->ajouterAdministrateur();
                echo "<div class='text-center'><p class='alert alert-success'>Vous etes desormais inscrit sur notre site.</p>
                        <a href='connexion-utilisateur' class='btn btn-success'>Se connecter</a>
                    </div>";
                ?>
                <style>
                    #form-register-user{
                        display: none;
                    }
                </style>
                <?php
            }
        }
    }
}


//Afficher la table des admin + les annonces + les utilisateurs + regions + catégories
function afficherTouteLesTables(){
    $admin = new Administration();
    //Appel des methodes de la classe Administration
    $tableAdmin = $admin->afficherTableAdmin();
    $tableAnnonce = $admin->afficherTableAnnonce();
    $tableRegion = $admin->afficherRegion();
    $tableCategorie = $admin->afficherCategories();
    //Appel de la vue
    require_once '../vues/administration/espace_administration.php';
    return array(
        $tableAdmin,
        $tableAnnonce,
        $tableRegion,
        $tableCategorie
    );
}

//Supprimer un admin
function supprimerAdmin(){
    //Instance du model (classe) annonce
    $admin = new Administration();
    $delete = $admin->supprimerUnAdministrateur();
    if($delete){
        echo "<div class='container text-center'><p class='alert alert-success'>Utilisateur supprimer !</p></div>";
        //redirection avec du delay
        header( "Refresh:3; url=espace_administration", true, 303);
    }else{
        echo "rien a supprimer";
    }
}