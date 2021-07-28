<?php
    session_start();
    ob_start();
    require("connect.php"); 
    if(isset($_SESSION["isletmeadi"])&&isset($_SESSION["alid"]))
    {
        $kullaniciadi=$_SESSION['isletmeadi'];
        $kullaniciid=$_SESSION["alid"];
    }
 
    if (isset($_GET['logout'])) 
    {
    unset($_SESSION['isletmeadi']);
    unset($_SESSION['alid']);
    session_unset();
    session_destroy();
    header("Location: giris.php");
    exit;
    }
?>