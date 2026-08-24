<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === "admin" && $password === "1234") {

    $_SESSION['username'] = $username;

    echo "Login successful!";
    echo "<br><br>";

    echo "
    <form action='dashboard.php' method='POST'>
        <input type='submit' value='Go to Dashboard'>
    </form>
    ";

} else {

    echo "Invalid username or password";

}
?>