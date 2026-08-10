<?php

// PDO connection with database
include("./conn.php");

$name = 'xy2113';
$city = 'abc123';

$insert_sql_query = "INSERT INTO stud (name, city) VALUES (?, ?)";

$stmt = $conn->prepare($insert_sql_query);

// bindParam() requires variables
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $city);

$stmt->execute();

echo "Data inserted successfully";

?>