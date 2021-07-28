<?php
    session_start();
    require("connect.php"); 
    if(isset($_SESSION["isletmeadi"])&&isset($_SESSION["urid"]))
    {
        $kullaniciadi=$_SESSION['isletmeadi'];
        $kullaniciid=$_SESSION["urid"];
    }
    $ureticiid=$_POST['submit'];
    $urunadi=$_POST["urun_tipi"];
    $miktar=$_POST["miktar"];
    $sql = "INSERT INTO stok(ur_ID,urun_ad,urun_miktar) values('$ureticiid','$urunadi','$miktar')";
    if (mysqli_query($conn, $sql)) {      
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?> 
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
  require("connect.php"); 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>İşletme Tedarik platformu Üretici Sayfası</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/lines.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="js/d3.v3.js"></script>
<script src="js/rickshaw.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="alindex.php">Tedarik Platformu Üretici Sayfası</a>
            </div>
            <!-- /.navbar-header -->

			
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    <li>
                            <a href="urindex.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Anasayfa</a>
                        </li>
                        <li>
                            <a href="urteklifver.php"><i class="fa fa-laptop nav_icon"></i>Teklif Ver</a>
                        </li>
                        <li>
                            <a href="urharita.php"><i class="fa fa-indent nav_icon"></i>Haritalar</a>
                        </li>
                        <li>
                            <a href="urstokekle.php"><i class="fa fa-envelope nav_icon"></i>Stok Ekle</span></a>
                        </li>
                        <li>
                            <a href="urcevap.php"><i class="fa fa-flask nav_icon"></i>Cevaplar</a>
                        </li>
                        <li>
                            <a href="cikisyap.php?logout"><i class="fa fa-sitemap fa-fw nav_icon"></i>Çıkış Yap</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            <h3 style="font-family:verdana; margin-left:1600px; color:black;"><?php echo " $kullaniciadi" ?></h3> 
        </nav>
        <div id="page-wrapper">
        <div class="graphs">
            <h2 class="form-heading">Başarıyla Stok Eklediniz. Yeni Stok Eklemek Geri Gidebilirsiniz. </h2>
            <center><a href=javascript:history.back(-1)>Geri Don</a><center>
     	</div>
     

<script>


</body>
</html>