<?php
require("../controllers/panier.php");
$panierInstance = new PanierController();

	    	$id =$_GET['id'];
            $panierInstance->supprimerpanier($id);
            header("Location: ./affichepanier.php");
            
	    
?>