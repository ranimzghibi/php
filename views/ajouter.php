<?php
session_start();
require("../controllers/commandes.php");
if(!(isset($_SESSION['ranim']))) {
  header ("location: ./login.php");
}
if(empty($_SESSION['ranim'])) {
  header ("location: ./login.php");
}
$cmd = new Commandes();

?>

<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
}

.container-fluid {
    padding: -20px;
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
        <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="ajouter.php">Nouveau</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="supprimer.php">Changement</a>
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
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">L'image du produit</label>
    <input type="name" class="form-control" name="image" required>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" name="nom"  required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="number" class="form-control" name="prix" required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" required></textarea>
  </div>

  <button type="submit" name="supp" class="btn btn-dark">Ajouter un nouveau produit</button>
</form>

      </div></div></div>

    
</body>
</html>

<?php


  if(isset($_POST['supp']))
  {
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
    {
    if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
	    {
	    	$image = $_POST['image'];
	    	$nom = $_POST['nom'];
	    	$prix =$_POST['prix'];
	    	$desc = $_POST['desc'];
          
          try 
          {
            $cmd->ajouter($image, $nom, $prix, $desc);
            //header('Location: .../index.php');
          } 
          catch (Exception $e) 
          {
            echo "Erreur de connexion : " . $e->getMessage();
          }

	    }
    }
  }
  ?>