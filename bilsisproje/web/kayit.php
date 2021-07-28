<?php
require("connect.php");
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
<title>Kayıt Olma Ekranı</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
    <a href="index.html"><img src="images/logoos.png" alt=""/></a>
  </div>
  <h2 class="form-heading">Kayıt Ol</h2>
  <form class="form-signin app-cam" action="kayitol.php" method="post">
      <p>Bilgilerinizi girin</p>
      <input type="text" class="form-control1" placeholder="İşletme Adı" name="iadi" autofocus="">
      <input type="text" class="form-control1" placeholder="Adres" name="adres" autofocus="">
      <input type="text" class="form-control1" placeholder="Email" name="mail" autofocus="">
      <input type="text" class="form-control1" placeholder="Şehir" name="sehir" autofocus="">
      <input type="password" class="form-control1" name="sifre" placeholder="Şifrenizi Belirleyiniz">
      <div class="radios">
            <input type="radio" id="uyetip0" name="uyetipi" value="0">
            <label for="numune0">Alıcı</label><br>
            <input type="radio" id="uyetip1" name="uyetipi" value="1">
            <label for="numune1">Üretici</label><br>
	  </div>
      <button class="btn btn-lg btn-success1 btn-block" type="submit" name="kayit_btn" >Kayıt Ol</button>
      <div class="registration">
          Üye misiniz?
          <a class="" href="giris.php">
              Giriş ekranı
          </a>
      </div>
  </form>
   <div class="copy_layout login register">
   </div>
</body>
</html>
