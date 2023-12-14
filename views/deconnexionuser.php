<?php
session_start();

if (isset($_SESSION['id_user'])){
    $_SESSION['id_user']=array();
    session_destroy();
    header ("location:  ./index.php");
}
else{
    header ("location: ./index.php");
}
?>