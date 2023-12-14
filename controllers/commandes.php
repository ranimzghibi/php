<?php

include_once("../database/connexion.php");
include_once("../models/produits.php");
include_once("../models/admin.php");

class Commandes extends Connexion {
    function __construct() {
        parent::__construct();
    }

    function getAdmins($email, $password) {
        $req = $this->pdo->prepare("SELECT * FROM admin WHERE e_mail = ? AND motdepass = ?");
        $req->execute(array($email, $password));
    
        if ($req->rowCount() == 1) {
            $data = $req->fetch();
            
            $admin = new Admin();
            $admin->setE_mail($data['e_mail']); 
            $admin->setMotdepass($data['motdepass']);
    
            return $admin;
        } else {
            return false;
        }
        $req->closeCursor();
    }
    

    function ajouter($nom, $image, $prix, $description) {
        $req = $this->pdo->prepare("INSERT INTO produit (image, nom, prix, description) VALUES (?, ?, ?, ?)");
        $req->execute(array($nom, $image, $prix, $description));
        $req->closeCursor();
    }

    function afficher() {
        $req = $this->pdo->prepare("SELECT * FROM produit ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    function afficherId($id) {
        $req = $this->pdo->prepare("SELECT * FROM produit where id = ?");
        $req->execute(array($id));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        if (count($data) > 0) {
            return $data[0];
        } else {
            return null; 
        }
    }

    function supprimer($id) {
        $req = $this->pdo->prepare("DELETE FROM panier WHERE id_produit = ?");
        $req->execute(array($id));
        $req = $this->pdo->prepare("DELETE FROM produit WHERE id = ?");
        $req->execute(array($id));
    }
    
    function editer(Produits $p) {
        $sql = "UPDATE `produit` SET image=?, nom=?, prix=?, description=? WHERE `produit`.`id` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($p->getImage(), $p->getNom(), $p->getPrix(), $p->getDescription(), $p->getId()));
    }
}

$commandesInstance = new Commandes();


?>
