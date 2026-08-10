<html>
<head>
    <title> Student Registration</title> 
</head>
<body>
    <form action=" method="post">
        <h1>Student Registration Form</h1>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="course">Course:</label>
        <input type="text" name="course" id="course" required><br><br>

        <input type="submit" value="Register">       

<?php
include("./conn.php");
 if (isset ($_POST['save']))
    {
        $Student_name = $_POST['name'];
        $Student_email = $_POST['email'];
        $Student_course = $_POST['course'];

        $sql = "INSERT INTO STUD (name, email, course) VALUES (:name, :email, :course)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $Student_name);
        $stmt->bindParam(':email', $Student_email);
        $stmt->bindParam(':course', $Student_course);

        $stmt->execute();   
        if ($stmt) {
            echo "Student registered successfully.";
        } else {
            echo " registration failed: ";
        }
    }
?>
</form>
</body>
</html>