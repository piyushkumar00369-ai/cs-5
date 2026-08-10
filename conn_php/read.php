<?php

include("conn.php");

$show_data = "SELECT * FROM stud";

$get_stud = $conn->prepare($show_data);
$get_stud->execute();

$students_data = $get_stud->fetchAll(PDO::FETCH_ASSOC);

echo "<br>";

echo "<table border='1' cellpadding='20'>";

echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>City</th>";
echo "</tr>";

foreach ($students_data as $student) {
    echo "<tr>";
    echo "<td>" . $student['id'] . "</td>";
    echo "<td>" . $student['name'] . "</td>";
    echo "<td>" . $student['city'] . "</td>";
    echo "</tr>";
}

echo "</table>";

?>