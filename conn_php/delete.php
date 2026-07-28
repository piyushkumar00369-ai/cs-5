<?php
include ("./conn.php");

$sql_delete = "delete from stud where id =1";
$stmt = $conn->prepare($sql_delete);
$stmt->execute();
echo "data deleted";
?>