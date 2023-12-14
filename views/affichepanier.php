<?php
include_once("../models/user.php");
include_once("../controllers/commandes.php");
/*if (session_status() === PHP_SESSION_NONE) {
    header("Location: user_login.php");
    exit();
}*/
session_start();

$userId = $_SESSION['id_user'] ;


require("../controllers/panier.php");

$panierInstance = new PanierController();
$data = $panierInstance->afficher($userId);

/*
if(!isset($_SESSION['ranim']))
{
    header("Location: ./login.php");
}

if(empty($_SESSION['ranim']))
{
    header("Location: ./login.php");
}
*/




?>

<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Tous les produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="index.php">Ranim'shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div>
    <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="deconnexionuser.php">Se deconnecter</a>
    </div>
</div>
</nav>


<div class="album py-5 bg-light">
    <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <table class="table table-striped ">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">id_user	</th>
                <th scope="col">id_produit	</th>
                <th scope="col">image</th>
                <th scope="col">nom</th>
                <th scope="col">prix</th>
                
                
                </tr>
            </thead>
            <tbody>
            <?php 
            $total = 0;

            foreach ($data as $commande){
                $produit = $commandesInstance->afficherId($commande->id_produit);
                $total += $produit->prix; 
                echo(" <tr>
                        <th scope='row'> $produit->id </th>
                        <td> $commande->id_user </td>
                        <td> $commande->id_produit</td>
                        <td>
                            <img src='$produit->image ' style='width: 10%'>
                        </td>
                        <td> $produit->nom </td>
                        <td style='font-weight: bold; color: green;'> $produit->prix TND</td>
                        <td><a href='supprimerpanier.php?id={$commande->id_produit}'><i class='fas fa-trash text-danger' style='font-size: 30px;'></i></a></td>
 
                    </tr>");
            } 
            ?>


            </tbody>
            </table>
    </div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Total: <?= $total ?> TND</h2>
            <a href="passercommende.php" class="btn btn-primary btn-block">Passer la commande</a>
        </div>
    </div>
</div>
</body>
</html>



