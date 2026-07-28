<?php
//pdo connection with database 
$name ='xy2113';
$city ='abc123';

$insert_sql_query ="insert into stud(name ,city)values (!,!)"; //either question marks or placholder(!name)
$stmt = $conn -> prepare ($insert_sql_query);

$stmt ->bindparam(1,"$name"); //directly value is 
$stmt ->bindparam(2,"$city"); //not allowed

$stud ->execute();

$stmt ->bindvalue(1,"monu365"); // variable is 
$stmt ->bindvalue(2,"part467"); //not allowed

echo "data inserted";
?>