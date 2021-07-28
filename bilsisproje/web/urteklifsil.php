<?php
    session_start();
    require("connect.php"); 
    if(isset($_SESSION["isletmeadi"])&&isset($_SESSION["urid"]))
    {
        $kullaniciadi=$_SESSION['isletmeadi'];
        $kullaniciid=$_SESSION["urid"];
    }
    $tekid=$_POST['submit'];
    $tekid=(int)$tekid;
    $silsorgu="DELETE FROM teklif WHERE teklif.teklif_ID = '$tekid'";
    echo $tekid;
    if (mysqli_query($conn, $silsorgu)) {
        header("Location: urcevap.php");
    }      
    else {
        echo "Error: " . $silsorgu . "<br>" . mysqli_error($conn);
    }
?> 