<?php
    session_start();
    ob_start();
    require("connect.php"); 
    if(isset($_SESSION["isletmeadi"])&&isset($_SESSION["urid"]))
    {
        $kullaniciadi=$_SESSION['isletmeadi'];
        $kullaniciid=$_SESSION["urid"];
    }
 
    if (isset($_GET['logout'])) 
    {
    unset($_SESSION['isletmeadi']);
    unset($_SESSION['urid']);
    session_unset();
    session_destroy();
    header("Location: giris.php");
    exit;
    }
?>