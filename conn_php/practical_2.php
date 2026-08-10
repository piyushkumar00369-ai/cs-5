<?php

$dsn = "mysql:host=localhost;dbname=CS-5";
$username = "root";
$password = "";

try {

    $conn = new PDO($dsn, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database connected successfully.<br><br>";

    $create_table = "CREATE TABLE STUD (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50),
        city VARCHAR(50)
    )";

    $stmt = $conn->prepare($create_table);
    $stmt->execute();

    echo "Table created successfully.<br><br>";

    $name = "Rahul";
    $city = "Ahmedabad";

    $insert = "INSERT INTO STUD (name, city) VALUES (?, ?)";

    $stmt = $conn->prepare($insert);

    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $city);

    $stmt->execute();

    echo "Data inserted successfully.<br><br>";


    $select = "SELECT * FROM STUD";

    $stmt = $conn->prepare($select);
    $stmt->execute();

    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>Student Records</h3>";

    echo "<table border='1' cellpadding='10'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>City</th>";
    echo "</tr>";

    foreach ($students as $student) {

        echo "<tr>";

        echo "<td>" . htmlspecialchars($student['id']) . "</td>";
        echo "<td>" . htmlspecialchars($student['name']) . "</td>";
        echo "<td>" . htmlspecialchars($student['city']) . "</td>";

        echo "</tr>";
    }

    echo "</table><br>";

    $id = 2;
    $new_name = "Ravi";

    $update = "UPDATE STUD SET name = ? WHERE id = ?";

    $stmt = $conn->prepare($update);

    $stmt->bindParam(1, $new_name);
    $stmt->bindParam(2, $id);

    $stmt->execute();

    echo "Data updated successfully.<br><br>";


    $delete_id = 1;

    $delete = "DELETE FROM STUD WHERE id = ?";

    $stmt = $conn->prepare($delete);

    $stmt->bindParam(1, $delete_id);

    $stmt->execute();

    echo "Data deleted successfully.<br><br>";

}
catch (PDOException $e) {

    echo "Operation failed: " . $e->getMessage();

}

?>