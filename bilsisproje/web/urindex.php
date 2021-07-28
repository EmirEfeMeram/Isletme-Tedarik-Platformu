<?php
    session_start();
    require("connect.php"); 
    if(isset($_SESSION["isletmeadi"])&&isset($_SESSION["urid"]))
    {
        $kullaniciadi=$_SESSION['isletmeadi'];
        $kullaniciid=$_SESSION["urid"];
    }
    $teklifsayisorgu= mysqli_query($conn,"SELECT uretici.ur_ID,uretici.isletme_ad,COUNT( teklif.teklif_ID) as 'teklif_sayi'FROM uretici,teklif WHERE uretici.ur_ID=teklif.ur_ID AND teklif.ur_ID='$kullaniciid' ");
    $teklifsayidizi=mysqli_fetch_array($teklifsayisorgu);
    $teklifsayi=$teklifsayidizi['teklif_sayi'];
    $tekkabulsayisorgu=mysqli_query($conn,"SELECT teklif_kabul.kabul, COUNT(teklif.teklif_ID) AS 'kabul_sayi', teklif.ur_ID FROM teklif,teklif_kabul WHERE teklif.teklif_ID=teklif_kabul.teklif_ID AND teklif.ur_ID='$kullaniciid' AND teklif_kabul.kabul=1 ");
    $tekkabulsayidizi=mysqli_fetch_array($tekkabulsayisorgu);
    $tekkabulsayi=$tekkabulsayidizi['kabul_sayi'];



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
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Ürünler', '2019 yılı Üretimi/Ton'],
        ['Domates', 4083681],
        ['Patates', 4979824],
        ['Kuru Soğan', 2200000],
        ['Patlıcan', 822659],
        ['Sivri Biber',902203],
        ['Lahana',239456]
    ]);

    var options = {
        chart: {
        title: '2019 yılı sebze üretimi',
        }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>


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
        <div class="graphs">
        <div class="col_3">
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $teklifsayi ?></strong></h5>
                      <span>Yapılan Teklif Sayısı</span>
                    </div>
                </div>
        	</div>
            <div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $tekkabulsayi ?></strong></h5>
                      <span>Kabul Edilen Teklif Sayısı</span>
                    </div>
                </div>
        	</div>
            <div class="clearfix"> </div>
        </div>
        <div class="row">
            <div class="col-lg-6">    
                <div>
                    <div id="columnchart_material" style="width: 800px; height: 500px; margin-top: 50px "></div>
                </div>
            </div>
            <div class="col-lg-6" style="margin-top: 50px">
                <div class="cal1 cal_2 "><div class="clndr" ><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
            </div>
        </div>    
  
    </div>
     	
     

<script>


</body>
</html>
