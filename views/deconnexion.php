<?php
session_start();

if (isset($_SESSION['ranim'])){
    $_SESSION['ranim']=array();

    session_destroy();
    header ("location:  ./index.php");

}
else{
    header ("location: ./index.php");
}
?>