<style>
body {
    font-family: 'Roboto', sans-serif;
    background-color: #fafafa;
   
}

.container-fluid {
    max-width: 900px;
    margin: 0 auto;
}

.row {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 50vh;
}

.col-md-6 {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
}

.form-label {
    font-weight: bold;
    color: #333;
}

.form-control {
    width: 100%;
    padding: 15px;
    box-sizing: border-box;
    border: 2px solid #ced4da;
    border-radius: 5px;
    background-color: #f5f5f5;
    color: #333;
    margin-bottom: 20px;
    transition: border-color 0.3s ease-in-out;
}

.form-control:focus {
    border-color: #007bff;
}

.btn-primary {
    background-color: #007bff;
    color: #777;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.btn-primary:hover {
    background-color: #777;
}


</style>
<?php
session_start();

include "../controllers/commandes.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <br>
    <br>
    <br>
    <br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<div class="container-fluid">
    <div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
                <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" class="form-control" name="email">
                    
                </div>
                <div class="mb-3">
                    <label for="motdepasse" class="form-label">mot de pass</label>
                    <input type="password" class="form-control" name="motdepasse">
                </div>
               
                <input type="submit" class="btn btn-light" value="se connecter" name="envoyer">
                </form>
</div>
<div class="col-md-3"></div>    
    </div>
</div>
</body>
</html>

<?php

if (isset($_POST['envoyer'])){
    if (!empty($_POST['email']) and !empty($_POST['motdepasse'])){
        $email= $_POST['email'];
        $motdepasse= $_POST['motdepasse'];
        $admin = $commandesInstance->getAdmins($email, $motdepasse);
        if ($admin){

            $_SESSION['ranim'] = $admin;
            header ("location: ./afficher.php");

        }else{
            echo "il y a un probleme !!!!!!!!";
        }
    }
}

?>