<?php
class Produits {
private $id,$image,$nom,$prix,$description;
function __construct($image="",$nom="",$prix="",$description="") {
	
    $this->image=$image;
    $this->nom=$nom;
    $this->prix=$prix;
    $this->description=$description;
}
public function setId($id) {
    $this->id = $id; 
}
public function getId() {
    return $this->id;
}
public function getImage() {
    return $this->image;
}


public function setImage($image) {
    $this->image = $image;
}

public function getNom() {
    return $this->nom;
}


public function setNom($nom) {
    $this->nom = $nom;
}


public function getPrix() {
    return $this->prix;
}

public function setPrix($prix) {
    $this->prix = $prix;
}


public function getDescription() {
    return $this->description;
}

public function setDescription($description) {
    $this->description = $description;
}
}?>