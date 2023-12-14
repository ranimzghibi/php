<?php
session_start();
require("../controllers/userLogin.php");

$sign = new Userdata();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créez votre compte sur VotreSite</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .signup-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #777;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f5f5f5;
            color: #333;
        }

        button {
            background-color: #777;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #777;
        }

        .login-link {
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="signup-container">
    <h2> Créez votre compte  </h2>
    <form  method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="creer">Créer un compte</button>
    </form>

    <a href="user_login.php" class="login-link">Vous avez déjà un compte ? Connectez-vous</a>
</div>

</body>
</html>

<?php
  if(isset($_POST['creer']))
  {
    if(isset($_POST['username']) AND isset($_POST['email']) AND isset($_POST['password']) )
    {
    if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['password']))
	    {
	    	$username = $_POST['username'];
	    	$email = $_POST['email'];
	    	$motdepass =$_POST['password'];
          try 
          {
            $sign->ajouter($username,$motdepass,$email);
            header('Location: user_login.php');
          } 
          catch (Exception $e) 
          {
            echo "Erreur de connexion : " . $e->getMessage();
          }

	    }
    }
  }
  ?>
