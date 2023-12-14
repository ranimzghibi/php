<?php
include_once("../database/connexion.php");
include_once("../controllers/panier.php");
class CommendeController extends Connexion {
    protected $pdo;
    protected $panierController;

    public function __construct() {
        parent::__construct();
        $this->panierController = new PanierController();
    }

    function ajouterProduitsALaCommande($userId) {
        $produits = $this->panierController->afficher($userId);
        if (!empty($produits)) {
            foreach ($produits as $produit) {
                $req = $this->pdo->prepare("INSERT INTO commende (id_produit, id_user) VALUES (?, ?)");
                if (!$req->execute([$produit->id_produit, $userId])) {
                    echo "Erreur SQL : " . print_r($req->errorInfo(), true);
                }
            }
        } else {
            echo "Aucun produit à ajouter à la commande.";
        }
    }
    
}
