<?php
    session_start();
    require("connect.php"); 
    if(isset($_SESSION["isletmeadi"])&&isset($_SESSION["alid"]))
    {
        $kullaniciadi=$_SESSION['isletmeadi'];
        $kullaniciid=$_SESSION["alid"];
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
<title>İşletme Tedarik platformu Alıcı Sayfası</title>
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
                <a class="navbar-brand" href="alindex.php">Tedarik Platformu Alıcı Sayfası</a>
            </div>
            <!-- /.navbar-header -->

			
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="alindex.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Anasayfa</a>
                        </li>
                        <li>
                            <a href="alilanolustur.php"><i class="fa fa-laptop nav_icon"></i>İlan Oluştur</a>
                        </li>
                        <li>
                            <a href="alharita.php"><i class="fa fa-indent nav_icon"></i>Haritalar</a>
                        </li>
                        <li>
                            <a href="aluretici.php"><i class="fa fa-envelope nav_icon"></i>Üreticiler</span></a>
                        </li>
                        <li>
                            <a href="alteklifbak.php"><i class="fa fa-flask nav_icon"></i>Tekliflere Bak</a>
                        </li>
                        <li>
                            <a href="cikisyapal.php?logout"><i class="fa fa-sitemap fa-fw nav_icon"></i>Çıkış Yap</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            <h3 style="font-family:verdana; margin-left:1600px; color:black;"><?php echo " $kullaniciadi" ?></h3> 
        </nav>
        <div id="page-wrapper">
        <div class="bs-example1" data-example-id="contextual-table">
		    <table class="table">
		      <thead>
		        <tr>
		          <th>İşletme Adı</th>
		          <th>Şehir</th>
                  <th>Email</th>
                  <th>Adres</th>
                  <th>Ürün Tipi</th>
                  <th>Miktar</th>
		        </tr>
              </thead>
              <tbody>
            <?php
                $ureticistoklar=mysqli_query($conn,"SELECT uretici.isletme_ad,uretici.sehir,uretici.email,uretici.adres,stok.urun_ad,stok.urun_miktar FROM uretici,stok WHERE uretici.ur_ID=stok.ur_ID " );

                while($satir=mysqli_fetch_array($ureticistoklar))
                {  

                    echo '<tr class="active">';
                    echo '<td>'.$satir['isletme_ad'].'</td>';
                    echo '<td>'.$satir['sehir'].'</td>';
                    echo '<td>'.$satir['email'].'</td>';
                    echo '<td>'.$satir['adres'].'</td>';
                    echo '<td>'.$satir['urun_ad'].'</td>';
                    echo '<td>'.$satir['urun_miktar'].' KG </td>';
                    echo '</tr>';                    

                    
                    
                }
                ob_end_flush();
            ?>
		      
		      </tbody>
		    </table>
		   </div>
	   </div>
        <div class="graphs">
     	
     

<script>


</body>
</html>