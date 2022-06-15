<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Load Composer's autoloader
require '../vendor/autoload.php';

//appel de la classe mere Database.php
require_once '../modeles-backend/Database_backend.php';

//Sans autoload.php (ici exemple d'appel de la classe Exception)
//require_once "../vendor/phpmailer/phpmailer/src/Exception.php";


class Email extends Database {
    /**
     * @var string
     */
    private $email_utilisateur;
    /**
     * @var string
     */
    private $password_utilisteur;

    public function inscriptionEmail (){
        
//Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = '9427859f295dcb';                     //SMTP username
            $mail->Password = 'aa1c614a61c312';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            //Acces a la methode getPDO() de la classe mere Database.php pour se connecter a la base de données
            $db = $this->getPDO();
            //Desinfecter les faits champs trim(supprimer les espaces en debut et fin de chaine) htmlspecialchars(transforme les balises et charactères spéciaux en chaine de charatères)
            //Lutte contre injection SQL
            //Assignation des propriétées privées desinféctée a chaque champ POST du formulaire
            $this->email_utilisateur = trim(htmlspecialchars($_POST['email']));
            $this->password_utilisteur = trim(htmlspecialchars($_POST['password']));

            //verifié dans la table si email existe deja
            $checkEmail = $db->prepare("SELECT * FROM utilisateurs WHERE email_utilisateur = ?");
            //Execute la requète
            $checkEmail->execute(
                array($this->email_utilisateur)
            );

            //Parcours le dernier resultat de la methode PDO->execute
            $utilisateur = $checkEmail->fetch();

            //Si utilisateur retourne true = cet email existe deja dans la table donc on retourne une erreur
            if($utilisateur){
                ?>
                <p class="red orange-text" style="padding: 20px">Cet email n'est pas disponible</p>
                <a href="inscription" class="btn deep-orange">Retour</a>
                <?php
            }else{
                //Si le mail est disponible: on effetue une requète d'insertion
                //le role par defaut est utilisateur
                $role = "utilisateur";
                //la requète SQL
                $ajouterUtilisateur = $db->prepare(
                    "INSERT INTO `utilisateurs`
                        (`email_utilisateur`, `password_utilisateur`, `role`) 
                        VALUES (?,?,?)");
                //on lie les champs du formulaire aux paramètres de la requète SQL
                $ajouterUtilisateur->bindParam(1, $this->email_utilisateur);
                $ajouterUtilisateur->bindParam(2, $this->password_utilisteur);
                $ajouterUtilisateur->bindParam(3, $role);

                //Hash du mot passe(2 paramètres : le $_POST + le type de hashage)
                $hash_password = password_hash($this->password_utilisteur, PASSWORD_DEFAULT);
                //on execute la requète (le second paramètre est le mot de passe haché)
                $ajouterUtilisateur->execute(
                    array(
                        $this->email_utilisateur,
                        $hash_password,

                        $role
                    )
                );

                //le contenu du bouton dans email = redirection vers le site
                //ATTENTION on passe de mailTrap a notre site: URL est absolue = localhost/votreprojet/route
                $redirect = "http://localhost/MVC_PHP_Petites_annonces/connexion";

                /// //////////////////////////////////////
                //Le sujet de email
                $mail->Subject = 'Votre inscription sur le site annonce.com';
                //ici recup les donnée du formaulaire pour les afficher dans l'email
                //Un email est similaire a une page HTML5
                //ici le css est dans les balises
                $mail->Body    = '
                 <!DOCTYPE html>
                        <html lang="fr">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="Content-Type" content="text/html">
                            <title>Votre inscription sur Mic-Annonce.com</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        </head>
                        <body style="color: #43617f; font-size: 22px;text-align: center; padding: 20px">
                        <div style="padding: 20px;">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6fV5-gvJoErCmW1i-kzcc5C0slzboniFycw&usqp=CAU" width="75px" height="75px" alt="" title="mic_annonce.com">
                        </div>
                        <div style="padding: 20px;">
                            <h1>Annonce.com</h1>
                            <h2>Bonjour : '.$this->email_utilisateur.'</h2>
                            <p>Vous êtes desormais inscrit sur le site Annonce.com merci de valider votre inscription avec le liens suivant</p><br />
                            <p>Recapitulatif de vos information de connexion</p>                      
                            <p>Email :<b style="color: #8b0000"> '.$this->email_utilisateur.'</b></p>
                            <p>Mot de passe :<b style="color: #8b0000;">'.$this->password_utilisteur.'</p>
                            <br /><br />
                            <a href="' . $redirect . '" style="background-color: darkred; color: #F0F1F2; padding: 20px; text-decoration: none;">Confimer votre inscription sur notre site</a><br />
                            <br /><br />                      
                            <p style="color: #43617f;">Merci d\'utiliser notre site web</p>
                            <p style="color: #43617f;">Cordialement : Annonces.com: Marine CALANDRI: Administrateur</p>    
                        </div>
                        </body>
                        </html>
            
            ';
                //Corps du mail alternatif
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                //Conversion de HTML5
                $mail->body = "MIME-Version: 1.0" . "\r\n";
                //le type de contenu est du texte + HTML5 + encodage des charactères = UTF8 (latin)
                $mail->body .= "Content-type:text/html;charset=utf8" . "\r\n";

                //Cette methode envoie le mail
                $mail->send();
                //Si ca marche on cache le formulaire en css et on affiche le message de succès
                ?>
                <style>
                    #inscription-form{
                        display: none;
                    }
                </style>
                <?php
                //Message de succes + bouton pour aller a la connexion
                echo "<div class='container center'>
                            <div class='green lighten-3 text-warning' style='padding: 20px'>Merci pour votre inscription, 
                            un email de validation vous a
                             été envoyé, merci de validé votre inscription pour acceder à votre tableau de bord.</div>
                            <a href='connexion' class='btn btn-success'>Connexion</a>                                                       
                        </div>";
            }

            //Si le try echoue
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


}