<?php
//Appel de la classe mere et de la methode getPDO
require_once '../modeles-backend/Database_backend.php';
class Administration extends Database
{
    //propriétées privées
    private $id_admin;
    private $email_admin;
    private $password_admin;


    //Afficher tous les valeurs de la table administration
    public function  afficherTableAdmin(){
        $db = $this->getPDO();
        $sql = "SELECT * FROM utilisateurs";
        $tableAdmin = $db->query($sql);
        return $tableAdmin;
    }

    //Supprimer un Admin
    public function supprimerUnAdministrateur(){
        $db = $this->getPDO();
        $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = ?";
        $stmt = $db->prepare($sql);
        $this->id_admin = $_GET['id_admin'];
        //Lié les paramètre (ici id de annonce a $_GET id url)
        $stmt->bindParam(1, $this->id_admin);
        //Execution de la requète
        $deleteAdmin = $stmt->execute();
        //Retourne l'objet avec son id
        return $deleteAdmin;
    }

    //AJOUTER UN ADMIN
    public function ajouterAdministrateur(){
        //Connexion la bdd
        $db = $this->getPDO();

        //Check email disponible
        //Verifié que le nom et l'email n'existe pas deja
        $checkDatas = $db->prepare("SELECT * FROM utilisateurs WHERE email_utilisateur = ?");
        $checkDatas->execute(array(
            $this->email_admin
        ));
        //Parcours des nom et email des utilisateurs (1 a la fois)
        $utilisateur = $checkDatas->fetch();
        //Si le nom ou email existe deja = on affiche une erreur et stop le process
        if($utilisateur){
            ?>
            <div class='container text-center'>
                <div class='alert alert-danger'>Ce email n'est pas disponible</div>
                <a href='inscription-utilisateur' class="btn btn-warning">Recommencer</a>
            </div>
            <?php
        }else{
            $sql = "INSERT INTO utilisateurs (email_utilisateur, password_utilisateur, role) VALUES (?,?,?)";

            $this->email_admin = trim(htmlspecialchars($_POST['email_admin']));
            $this->password_admin = trim(htmlspecialchars($_POST['password_admin']));
            $this->role = "administrateur";

            $stmt = $db->prepare($sql);

            $stmt->bindParam(1, $this->email_admin);
            $stmt->bindParam(2, $this->password_admin);
            $hashPassword = password_hash($this->password_admin, PASSWORD_DEFAULT);
            $stmt->bindParam(3, $this->role);

            $stmt->execute(array($this->email_admin, $hashPassword, $this->role));
            return $stmt;
        }
    }

    /**********************TABLE ANNONCES***********************/
    //Afficher toutes les annonces
    public function afficherTableAnnonce(){
        $db = $this->getPDO();
        //Requète SQL + jointure
        $sql = "SELECT * FROM annonces INNER JOIN utilisateurs ON annonces.utilisateur_id = utilisateurs.id_utilisateur INNER JOIN categories ON annonces.categorie_id = categories.id_categorie INNER JOIN regions ON annonces.regions_id = regions.id_regions ORDER BY utilisateur_id ASC";
        $request = $db->query($sql);
        return $request;
    }


    /***********************REGIONS*********************/
    public function afficherRegion(){
        $db = $this->getPDO();
        $sql = "SELECT * FROM regions";
        $stmt = $db->query($sql);
        return $stmt;
    }
    /***********************CATEGORIES**********************/
    public function afficherCategories(){
        $db = $this->getPDO();
        $sql = "SELECT * FROM categories";
        $stmt = $db->query($sql);
        return $stmt;
    }

}