<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
include "../controllers/userLogin.php";
$userDataInstance = new Userdata();


if (isset($_POST['connecterUser'])) {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $userDataInstance->getUser($username, $password);

        if ($user) {
            //$_SESSION['user'] = $user;
            $_SESSION['id_user'] = $user->getIduser();
            $_SESSION['username'] = $user->getusername();
            
            // header("location: ./ajouter.php");
            header('Location: index.php');
            //exit(); 
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Both username and password are required";
    }
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur VotreSite</title>
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

        .login-container {
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

        .create-account-link {
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        .welcome-message {
            font-size: 18px;
            margin-bottom: 20px;
            color: #666; 
        }
    
    </style>
</head>
<body>

<div class="login-container">
    <h2>LOGIN</h2>
    <p class="welcome-message"></p>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" class="btn btn-light" value="se connecter" name="connecterUser">
    </form>

    <a href="signup.php" class="create-account-link">Vous n'avez pas de compte ? Créez-en un</a>
</div>

</body>
</html>
