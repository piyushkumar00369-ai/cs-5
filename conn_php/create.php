<?php 

include("./conn.php");
$create_table = "CREATE TABLE STUD (
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50),
city VARCHAR(50)
)";

$test = $conn -> prepare($create_table);
$test -> execute();

?>