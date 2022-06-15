<?php
//appel de la classe Email Inscription
require_once "../modeles-backend/Emailinscription_backend.php";
require_once "../modeles-backend/Utilisateur_backend.php";

//Cette fonction est appelée dans le routeur quand la route ==
function afficherFormulaireInscription(){
    //Appel fichier de la vue
    require_once "../vue-frontend/Utilisateurs/inscription.php";

    //var_dump($_POST['email']);
    //test du btn
    if(isset($_POST['btn-inscription'])){
        var_dump("ok click");
        //verifié le mot de passe et le mot passe repeter
        if($_POST['password'] === $_POST['password-repeat']){
            //Ici la classe qui envoi des emails
            $inscriptionEmail = new Email();
            $email = $inscriptionEmail->inscriptionEmail();
            return $email;
        }else{
            ?>
            <p class="red orange-text" style="padding: 20px">Les 2 mots de passe ne sont pas indentiques</p>
            <a href="inscription" class="btn deep-orange">Retour</a>
            <?php
        }

    }

}
