<?php

include("./conn.php");

$update_query = "UPDATE stud SET name = 'ravi' WHERE id = 2";

$stmt = $conn->prepare($update_query);
$stmt->execute();

echo "Data updated successfully";

?>