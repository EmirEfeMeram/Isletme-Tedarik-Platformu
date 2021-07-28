<?php
 session_start();
 require("connect.php");
 $isadi = trim($_POST['iadi']);
 $isadi = strip_tags($isadi);
 $isadi = htmlspecialchars($isadi);
 $adres = trim($_POST['adres']);
 $adres = strip_tags($adres);
 $adres = htmlspecialchars($adres);
 $email = trim($_POST['mail']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);
 $sehir = trim($_POST['sehir']);
 $sehir = strip_tags($sehir);
 $sehir = htmlspecialchars($sehir);
 $uyetipi = $_POST['uyetipi'];
 $sifre = trim($_POST['sifre']);
 $sifre = strip_tags($sifre);
 $sifre = htmlspecialchars($sifre);
 $error=FALSE;
 if(empty($isadi)){
     $error=TRUE;
 }
 if(empty($adres)){
    $error=TRUE;
}
if(empty($email)){
    $error=TRUE;
}
if(empty($sehir)){
    $error=TRUE;
}
if(empty($sifre)){
    $error=TRUE;
}
if(!$error && ($uyetipi=="0"))
{
    $sql = "INSERT INTO alici(isletme_ad,email,password,adres,sehir) values('$isadi','$email','$sifre','$adres','$sehir')";
    if (mysqli_query($conn, $sql)) {      
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
   

}
else if (!$error && ($uyetipi=="1")){
    $sql = "INSERT INTO uretici(isletme_ad,email,password,adres,sehir) values('$isadi','$email','$sifre','$adres','$sehir')";
    if (mysqli_query($conn, $sql)) {      
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>    
<!DOCTYPE HTML>
<html>
<head>
<title>Kayıt Olma Sayfası</title>
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
  
  <div class="app-cam" style= "margin-top: 200px;" ><?php
  if($error){
      echo "<h2 class='form-heading'>Kayıt Bilgilerinizi Lütfen Eksiksiz Doldurunuz </h2>
      <center><a href=javascript:history.back(-1)>Geri Don</a><center>";
  }
  else {
      echo "<h2 class='form-heading'>Bilgileriniz Başarıyla Kaydedildi </h2>
      <center><a href=giris.php>Giriş Ekranına Dön</a><center>";
  }
  ?>
  </div>
</body>
</html>