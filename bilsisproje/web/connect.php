<?php $servername = "localhost";
    $database = "bilsisdb";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");
    if ( !$conn ) {
        die("Connection failed : " . mysqli_error());
       }
?>