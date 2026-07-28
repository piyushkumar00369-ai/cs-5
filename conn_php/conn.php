<?php
$dsn ="mysql:host=localhost;dbname=CS-5";
$Username = "root";
$password ="";

try{
    $conn =new PDO ($dsn,$Username,$password);
    echo "Connected successfully";
}catch(PDOException $e){
    echo $e -> getmessage();   
}
?>