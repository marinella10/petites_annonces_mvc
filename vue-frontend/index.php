<?php
//On demarre une session php
session_start();
/*
 * ob_start() démarre la temporisation de sortie.
 *  Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
 */

ob_start();
//Auto loader de class
require "../vendor/autoload.php";
//Appel des controleurs
require_once "../controleurs/UtilisateursControleur.php";
require_once "../controleurs/AdministrationControleur.php";
require_once "../controleurs/AnnoncesControleur.php";
require_once "../controleurs/RegionsControleur.php";
require_once "../controleurs/CategoriesControleur.php";

//Si dans url, un paramètre url existe
if(isset($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = 'accueil';
}
//Si index.php?url= null
if($_GET['url'] === "accueil"){
    $url = 'accueil';
}


//******************PAGE ACCUEIL *********************//
if($url === "accueil"){
    $title = "ACCUEIL -petites-Annonces-";
    afficherAnnonces();
    if(isset($_POST['btn-search-text'])){
        //echo $_POST['recherche'];
        rechercheGlobalMotCle();
        //header("Location: resultat-recherche-texte");
    }
}






/*
 * ob_get_clean — Lit le contenu courant du tampon (du cache)de sortie puis l'efface
 */
//ici $content se situe dans le dossier template.php
$content = ob_get_clean();
require_once "template.php";