<?php

$dsn = "mysql:host=localhost;dbname=CS-5";
$username = "root";
$password = "";

try {

    $conn = new PDO($dsn, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database connected successfully.<br><br>";


    $city = "Ahmedabad";

    $sql = "SELECT * FROM STUD WHERE city = ?";

    $stmt = $conn->prepare($sql);

    // bindParam() uses a variable
    $stmt->bindParam(1, $city);

    $stmt->execute();

    echo "<h3>Using bindParam() and fetch()</h3>";

    while ($student = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "ID: " . htmlspecialchars($student['id']) . "<br>";
        echo "Name: " . htmlspecialchars($student['name']) . "<br>";
        echo "City: " . htmlspecialchars($student['city']) . "<br><br>";
    }



    $id = 2;

    $sql2 = "SELECT * FROM STUD WHERE id = ?";

    $stmt2 = $conn->prepare($sql2);

    // bindValue() directly binds a value
    $stmt2->bindValue(1, $id, PDO::PARAM_INT);

    $stmt2->execute();

    echo "<h3>Using bindValue() and fetchAll()</h3>";

    $students = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    foreach ($students as $student) {

        echo "ID: " . htmlspecialchars($student['id']) . "<br>";
        echo "Name: " . htmlspecialchars($student['name']) . "<br>";
        echo "City: " . htmlspecialchars($student['city']) . "<br><br>";
    }

}
catch (PDOException $e) {

    echo "Database Error: " . $e->getMessage();

}

?>