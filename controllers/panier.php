<?php
include_once("../database/connexion.php");

class PanierController extends Connexion {
    protected $pdo;

    // Constructor to initialize $pdo
    public function __construct() {
        parent::__construct();
    }
    
    function ajouterPannier($id, $userId) {
        $req1 = $this->pdo->prepare("SELECT * FROM produit WHERE id = ?");
        $req1->execute([$id]);
        $product = $req1->fetch();
    
        if ($product) {
            $req = $this->pdo->prepare("INSERT INTO panier (id_produit, id_user) VALUES (?, ?)");
            $req->execute([$id, $userId]);
        }
    }

    function afficher($userId) {
        $req = $this->pdo->prepare("SELECT * FROM panier WHERE id_user = ? ");
        $req->execute([$userId]);
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    function supprimerpanier($id) {
        $req = $this->pdo->prepare("DELETE FROM panier WHERE id_produit = ?");
        $req->execute(array($id));
    }

    function viderPanier($userId) {
        $req = $this->pdo->prepare("DELETE FROM panier WHERE id_user = ?");
        $req->execute([$userId]);
    }   
}
?>

