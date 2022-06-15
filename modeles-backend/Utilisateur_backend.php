<?php
//Ce fichier ce situe dans le dossier modeles
//Appel de la classe mere
require_once "../modeles-backend/Database_backend.php";
//la classe Utilisateurs hérite de la classe mere Database donc de toutes ses propriétés et methodes
class Utilisateurs extends Database
{
    //Le propriétés (visibilitées privée = accessible que dans cette classe)
    private $id_utilisateur;
    private $email;
    private $password;
    private $role;

    //la methode de connexion appélée dans le controleur au clic sur le bouton du formulaire
    public function connecterUtilisateurs(){
        //On stock dans une variable la connexion a la base de données via la classe PDO
        $db = $this->getPDO();

        //On assigne les champs du formulaire aux propriétées privées
        //On desinfecte les champs du formulaire de connexion
        $this->email = trim(htmlspecialchars($_POST['email']));
        $this->password = trim(htmlspecialchars($_POST['password']));
        //Role est une fenètre déroulante dans le formulaire
        $this->role = $_POST['role'];
        //La requète SQL avec email et role
        $sql = "SELECT * FROM utilisateurs WHERE email_utilisateur = ? AND role = ?";
        //Requète préparée
        $requete = $db->prepare($sql);
        //Liés les params du formulaire a la table
        $requete->bindParam(1, $this->email);
        $requete->bindParam(2, $this->role);
        //Execute la requète = retourne un tableau associatif cle/valeur
        $requete->execute(array(
            $this->email,
            $this->role,
        ));
        //Retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()
        if($requete->rowCount() >= 1){
            //On stock le dernier resultat de execute dans une variable
            $row = $requete->fetch();
            //Si email du formulaire = email de la table PhpMyAdmin
            if($this->email === $row['email_utilisateur']
                //Si le mot de passe du formulaire = le mot de passe haché
                //En réalité si salt genere a l'inscription = mot de passe haché generé a l'inscription
                && password_verify($this->password, $row['password_utilisateur'])
                //Et si le role =  admin ou user ?
                && $this->role = $row['role']){
                //Si le role est utilisateur
                if($row['role'] === "utilisateur"){
                    //On demarre une session + on creer des variables de session pour email + id + booleen
                    session_start();
                    //Cette variable de session a utilisé dans les routes
                    $_SESSION['connecter_utilisateur'] = true;
                    //Si 2 utilisateurs on le meme email = on utilise ID
                    $_SESSION['id_utilisateur'] = $row['id_utilisateur'];
                    //La variable de session email a afficher sur le tableau de bord utilisateur
                    $_SESSION['email_utilisateur'] = $this->email;
                    //La redirection = tableau de bord pour chaque utilisateur
                    header("Location: gestion_annonces");

                }else{
                    //Sinon on est admin
                    session_start();
                    $_SESSION['connecter_admin'] = true;
                    $_SESSION['email_admin'] = $this->email;
                    header("Location: espace_administration");
                }

            }else{
                echo "<p class='red yellow-text' style='padding: 20px'>Erreur ! Merci de vérifié votre email et mot de passe pour les utilisateurs</p>";
            }
        }else{
            echo "<p class='red yellow-text' style='padding: 20px'>Aucun utilisateur ne possèdent cet email et mot de passe: Erreur de fetch</p>";
        }

    }
}