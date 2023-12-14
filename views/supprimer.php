<style>

  body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
  }
  
  .album {
    background-color: #ffffff;
    padding: 30px;
  }

  .form-label {
    font-weight: bold;
  }

  .form-control {
    width: 100%;
    padding: 15px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ced4da;
    border-radius: 5px;
    transition: border-color 0.3s ease-in-out;
  }

  .form-control:focus {
    border-color: #007bff;
  }

  /* Primary button styles */
  .btn-primary {
    background-color: #007bff;
    color: #ffffff;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }

  /* Footer styles */
  .footer {
    text-align: center;
    padding: 15px;
    background-color: #343a40;
    margin-top: 20px;
    font-size: 1rem;
    color: #ffffff;
  }

 
  .invalid-feedback {
    color: #dc3545;
  }

  .valid-feedback {
    color: #28a745;
  }
</style>

<?php

session_start();

if(!(isset($_SESSION['ranim']))) {
 header ("location: login.php");
}

if(empty($_SESSION['ranim'])) {
  header ("location: login.php");
}

require("../controllers/commandes.php");

$commandesInstance = new Commandes();
$mesProduits = $commandesInstance->afficher();

?>


<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<title></title>
  

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="../">Ranim'shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link active"  href="afficher.php">Produits</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="ajouter.php">Nouveau</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="supprimer.php">Changement</a>
        </li>
        
    </ul>
    <div>
    <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="deconnexion.php">Se deconnecter</a>
    </div>
</div>
</nav>
<div class="album py-5 bg-light">
    <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">nom</th>
                <th scope="col">prix</th>
                <th scope="col">Description</th>
                <th scope="col">suppression</th>
                <th scope="col">edition</th>
                </tr>
            </thead>
            <tbody>
<?php foreach($mesProduits as $produit): ?>
                <tr>
                <th scope="row"><?= $produit->id ?></th>
                <td>
                <img src="<?= $produit->image ?>" style="width: 15%">
                </td>
                <td><?= $produit->nom ?></td>
                <td style="font-weight: bold; color: green;"><?= $produit->prix ?>TND</td>
                <td><?= substr($produit->description, 0,100); ?>...</td>
                
                <td><a href="supprimer.php?id=<?= $produit->id ?>"><i class="fas fa-trash text-danger" style="font-size: 30px;"></i></a></td>
                <td><a href="editer.php?id=<?= $produit->id ?>"><i class="fa fa-pencil text-warning" style="font-size: 30px;"></i></a></td>

                </tr>      
<?php endforeach; ?>

            </tbody>
            </table>
    </div>
</div>
</div>
 
      

    
</body>
</html>

<?php
 
    if(isset($_GET['id']))
    {
	    	$id =$_GET['id'];
          try 
          {
            $commandesInstance->supprimer($id);
            //header('Location: .../index.php');
          } 
          catch (Exception $e) 
          {
            echo "Erreur de connexion : " . $e->getMessage();
          }
	    }  
  ?>