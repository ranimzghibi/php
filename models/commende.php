<?php
class Produits {
private $id_produit,$id_user;
function __construct($id_produit="",$id_user="") {
	
  
    $this->id_produit=$id_produit;
    $this->id_user=$id_user;
    
}
public function getid_produit() {
    return $this->id_produit;
}
public function setid_produit($id_produit) {
    $this->id_produit = $id_produit;
}
public function getid_user() {
    return $this->id_user;
}
public function setid_produit($id_user) {
    $this->id_user = $id_user;
}
}
?>