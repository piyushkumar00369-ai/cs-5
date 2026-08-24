<?php
session_start();

$message = "welcome";

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: practical_8.php");
    exit();
}

// Login
if (isset($_POST['login'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if($username == '' || $password == ''){
        $message = "Username and password are required!";
    }
    else if ($username == "admin" && $password == "1234") {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        $message = "Login successful!";
    } 
    else {
        $message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Login</title>
</head>

<body>

<?php

// Protected page
if (isset($_SESSION['username'])) {
    echo "<h2>Welcome " . htmlspecialchars($_SESSION['username']) . "</h2>";
    echo "<p>Login successful. This is a protected page.</p>";
    echo "<a href='?logout=true'>Logout</a>";
} 
else {
    echo "<h2>Login Page</h2>";

    if ($message != "") {
        echo "<p>" . htmlspecialchars($message) . "</p>";
    }

    ?>

    <form method="POST">
        Username:
        <input type="text" name="username">
        <br><br>

        Password:
        <input type="password" name="password">
        <br><br>

        <input type="submit" name="login" value="Login">
    </form>

    <?php
}

?>

</body>
</html>