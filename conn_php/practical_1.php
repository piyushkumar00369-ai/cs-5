<?php
$host ="localhost";
$dbname ="test";
$Username = "root";
$password ="";

$dsn ="mysql:host=localhost;dbname=test";
try{
    $pdo =new PDO ($dsn,$Username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();  
}
?>