<?php

session_start();

require("../controllers/commandes.php");
$commandesInstance = new Commandes();
$mesProduits = $commandesInstance->afficher();
require("../controllers/panier.php");
$panierInstance = new PanierController();

?>



<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Shop en ligne</title>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
      .produit {
            width: 300px;
            height: 500px; 
            border: 1px solid #000;
            margin: 5px;
            float: left;
        }
    </style>
    

  </head>

  <body>  
    
        
   <div class="collapse text-bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>About</h4>
          <p class="text-body-primary">Bienvenue chez Ranim'shop - l'élégance à portée de clic. Explorez notre collection soigneusement choisie pour une expérience de shopping en ligne exceptionnelle. Découvrez la mode avec nous.</p>

        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4>Connection</h4>
          <ul class="list-unstyled">
            <li><a href="user_login.php" class="text-white">se connecter</a></li>
           
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <!--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>-->
        <strong>Ranim'shop</strong>
        <?php

        if (isset($_SESSION['id_user'])){
          
          echo "<a href='deconnexionuser.php' class='btn btn-sm btn-outline-secondary' style='position: absolute; right: 50px;'>deconnexion</a>";
        }
        if (isset($_SESSION['id_user'])){
          
          echo "<a href='affichepanier.php' class='btn btn-sm btn-outline-secondary' style='position: absolute; right: 4px;'>
          <i class='fas fa-shopping-cart'></i>
      </a>";
        }
        ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
    <div class="col-md-6 p-lg-5 mx-auto my-5">
      <h1 class="display-3 fw-bold">Bienvenue chez Ranim'shop !</h1>
      <h3 class="fw-normal text-muted mb-3">Explorez notre univers exceptionnel </h3>
      <div class="d-flex gap-3 justify-content-center lead fw-normal">
        <a class="icon-link" href="#">
          <svg class="bi"><use xlink:href="#chevron-right"/></svg>
        </a>
        <a class="icon-link" href="#">
          <svg class="bi"><use xlink:href="#chevron-right"/></svg>
        </a>
      </div>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">





<?php foreach($mesProduits as $produit):?>

  <div >
        <div class="col">
          <div class="card shadow-sm">
            
            <title><?= $produit->nom?></title>
            <img src="<?= $produit->image?>" width= "419px" height="500px"/>
            <div class="card-body">
            <p class="card-text"><?=  substr($produit->description,0,100) ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <!--<a href="user_login.php" class="btn btn-sm btn-outline-secondary">acheter</a>-->
                <a href="ajouterpanier.php?id=<?= $produit->id ?>" class="btn btn-sm btn-outline-secondary">+</a>
               
                </div>
                <small class="text-body-secondary"><?= $produit->prix ?>TND</small>
              </div>
            </div>
          </div>
        </div>
</div>

<?php endforeach;?>





</main>

</body>
</html>
