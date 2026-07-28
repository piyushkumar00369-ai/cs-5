<?php
include ("conn.php");
$show_data ="SELECT * FROM stud";
$get stud =$conn -> prepare ($show_data);
$get stud -> execute();
$students_data =$getstud ->fetch ALL(PDO : : FETCH_ASOC);
echo "<br>";
echo "<table boder = | cellpading = 20";
echo "<tr>";
echo "<th> id </th>";
echo "<th> name </th>";
echo "<th> city </th>";
echo "</th>";

foreach($student data as student) {
    echo "<tr>";
    echo "<td>".$student ['id']. "</td>";
    echo "<td>".$student ['name']."</td>;
    echo "<td>".$student ['city']."</td>;
    echo "</tr>";
    
    echo"</table>";
    
}











?>