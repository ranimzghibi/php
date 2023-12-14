<?php
class Produits {
private $id,$id_produit,$id_user;
function __construct($id="",$id_produit="",$id_user="") {
	
    $this->id=$id;
    $this->id_produit=$id_produit;
    $this->id_user=$id_user;
    
}
public function setId($id) {
    $this->id = $id; 
}
public function getId() {
    return $this->id;
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