<?php
abstract class Connexion {
protected $pdo;
function __construct()
{
$this->pdo =new PDO('mysql:host=localhost;dbname=monoshop','root','');
}
function __destruct()
{
$this->pdo=null;
}



}
?>