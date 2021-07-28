<?php
    require("connect.php");
    session_start();
    $error = false;
    if( isset($_POST['grs_btn']) ) { 
     
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
        
        $password = trim($_POST['password']);
        $password = strip_tags($password);
        $password = htmlspecialchars($password);
        
        if(empty($email)){
         $error = true;
        }
        
        if(empty($password)){
         $error = true;
        }
        
        if (!$error) {
         
         $password1 = hash('sha256', $password);
        
         $urres=mysqli_query($conn,"SELECT ur_ID, isletme_ad, email, password FROM uretici WHERE email='$email'");
         $row=mysqli_fetch_array($urres);
         $count = mysqli_num_rows($urres);
         $alres=mysqli_query($conn,"SELECT al_ID, isletme_ad, email, password FROM alici WHERE email='$email'");
         $row1=mysqli_fetch_array($alres);
         $count1 = mysqli_num_rows($alres);

         
         if( $count == 1 && $row['password']==$password ) {
          $_SESSION['isletmeadi'] = $row['isletme_ad'];
          $_SESSION['urid'] = $row['ur_ID'];
          header("Location: urindex.php");
         } 
         else if($count1 == 1 && $row1['password']==$password )
         {
          $_SESSION['isletmeadi'] = $row1['isletme_ad'];
          $_SESSION['alid'] = $row1['al_ID'];
          header("Location: alindex.php");
         }

        }
        
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Giriş Hatası</title>
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
  
  <div class="app-cam" style= "margin-top: 200px;" >
        <h2 class="form-heading">Kullanıcı Adı veya Şifre Hatalı/Eksik Lütfen Tekrar Deneyiniz </h2>
        <center><a href=javascript:history.back(-1)>Geri Don</a><center>
  </div>
</body>
</html>
