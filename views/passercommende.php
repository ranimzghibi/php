<?php
session_start();

    include "../controllers/panier.php";
    include "../controllers/commende.php";
    $panierInstance = new PanierController();
    $commende = new CommendeController();
    $commende->ajouterProduitsALaCommande($_SESSION['id_user']);
    $panierInstance->viderPanier($_SESSION['id_user']);
    header("Location: thankyou.php");
?>