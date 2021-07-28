<?php
    session_start();
    require("connect.php"); 
    if(isset($_SESSION["isletmeadi"])&&isset($_SESSION["urid"]))
    {
        $kullaniciadi=$_SESSION['isletmeadi'];
        $kullaniciid=$_SESSION["urid"];
    }
?> 
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
                <a class="navbar-brand" href="urindex.php">Tedarik Platformu Üretici Sayfası</a>
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
        <div class="bs-example1" data-example-id="contextual-table">
		    <table class="table">
		      <thead>
		        <tr>
		          <th>İşletme Adı</th>
		          <th>Şehir</th>
                  <th>Ürün</th>
                  <th>Miktar</th>
                  <th>İstenilen Tarih</th>
                  <th>Alıcı Notu</th>
                  <th>Numune gönderimi</th>
                  <th>Teklif Edilen Fİyat</th>
                  <th>Kabul Durumu</th>
                  <th>Email</th>
		        </tr>
              </thead>
              <tbody>
            <?php
                $ilansorgu=mysqli_query($conn,"SELECT alici.isletme_ad,ilan.sehir,ilan.urun_ad,ilan.urun_miktar,ilan.istenilen_tarih,ilan.notlar,ilan.numune,teklif.fiyat,teklif.teklif_ID,alici.email FROM alici,ilan,teklif WHERE alici.al_ID=ilan.al_ID AND ilan.ilan_ID=teklif.ilan_ID AND teklif.ur_ID='$kullaniciid' " );

                while($satir=mysqli_fetch_array($ilansorgu))
                {   $teklifid=$satir['teklif_ID'];
                    $teklifsorgu=mysqli_query($conn,"SELECT teklif_kabul.kabul, teklif.teklif_ID, teklif.ur_ID FROM teklif,teklif_kabul WHERE teklif.teklif_ID=teklif_kabul.teklif_ID AND teklif.ur_ID='$kullaniciid' AND teklif.teklif_ID='$teklifid' ");
                    $tekliflist=mysqli_fetch_array($teklifsorgu);
                    $teklifkabul=$tekliflist['kabul'];
                    if($teklifkabul==""){
                        $tekliftext=" Cevap Bekleniyor";
                    }
                    else if($teklifkabul=="1"){
                        $tekliftext=" Teklifiniz Kabul Edildi";
                    }
                    else {
                        $tekliftext=" Teklifiniz Reddedildi.";
                    }
                    $numdurum=$satir["numune"];
                    if($numdurum=='0'){
                        $numtext="Hayır, Numune İstemiyor";
                    }
                    else{
                        $numtext="Evet, Numune İstiyor";
                    }

                    echo '<tr class="active">';
                    echo '<td>'.$satir['isletme_ad'].'</td>';
                    echo '<td>'.$satir['sehir'].'</td>';
                    echo '<td>'.$satir['urun_ad'].'</td>';
                    echo '<td>'.$satir['urun_miktar'].'</td>';
                    echo '<td>'.$satir['istenilen_tarih'].'</td>';
                    echo '<td>'.$satir['notlar'].'</td>';
                    echo '<td>'.$numtext.'</td>';
                    echo '<td>'.$satir['fiyat'].' TL </td>';
                    echo '<td>'.$tekliftext.'</td>';
                    echo '<td>'.$satir['email'].'</td>';
                    echo '</tr>';
                    if($teklifkabul=="0"){
                        echo '<tr>';
                        echo '<form name="form1" action="urteklifsil.php" method="post" >';
                        echo '<td class="tg-fuxe"><button name="submit" type="submit" value="'.$teklifid.'"> Teklifi Sil</button></td>';                  
                        echo '</form>';
                        echo '</tr>';
                    }


                    
                    
                }
                ob_end_flush();
            ?>
		      
		      </tbody>
		    </table>
		   </div>
        <div class="graphs">
     	
     

<script>


</body>
</html>
