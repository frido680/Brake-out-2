<?php 
    $servername = "mysql.caesar.elte.hu";  
    $username = "cenivagyok";
    $password = "o9Huwbp2GDAajUST";
    $databaseName = "cenivagyok";
    $conn = new mysqli($servername,$username,$password,$databaseName);
    if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }
?>
