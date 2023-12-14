<?php

include_once("../database/connexion.php");
include_once('../models/user.php');
class Userdata extends Connexion 
{
   // $username = isset($_POST['username']) ? $_POST['username'] : '';
   // $password = isset($_POST['password']) ? $_POST['password'] : '';

   /* if (empty($username) || empty($password)) {
        header('Location: user_login.php'); 
        exit();
    }*/
    
    function getUser($username, $password) {
        $req = $this->pdo->prepare("SELECT * FROM user WHERE username = ? AND motdepass = ? ");
        $req->execute(array($username, $password));
    
        if ($req->rowCount() == 1) {
            $data = $req->fetch();
            
            $user = new User();
            $user->setusername($data['username']);
            $user->setMotdepass($data['motdepass']);
            $user->setIduser($data['id_user']);
            return $user;
        } else {
            return false;
        }
        
    }
    function ajouter($username,$motdepass,$email) {
        $req = $this->pdo->prepare("INSERT INTO user (username,motdepass,email) VALUES (?, ?, ?)");
        $req->execute(array($username,$motdepass,$email));
        $req->closeCursor();
    }
}
?>



