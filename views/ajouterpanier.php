<?php
session_start();

include "../controllers/panier.php";
$panierInstance = new PanierController();
if (!isset($_SESSION['id_user'])){
    header ("location:  ./user_login.php");
}
    if ($_GET['id']) {
        $id = $_GET['id'];
        echo $_GET['id'];
        $userId = $_SESSION['id_user']; 
        

        $panierInstance->ajouterPannier($id, $userId);
        header ("location:  ./index.php");
    }
?>