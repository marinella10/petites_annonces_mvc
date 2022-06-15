<?php

class Database{


    public function getPDO(){

        try {
            $dbh = new PDO('mysql:host=localhost;dbname=petites_annonces;charset=UTF8', "root", "");
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //  echo "Vous etes connecter a PDO MySQL";
            return $dbh;
        } catch (PDOException $e) {
            echo "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }

    }
}