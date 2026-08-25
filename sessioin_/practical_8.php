<?php
session_start();

$message = '';
$error = '';

// Logout
if (isset($_GET['logout'])) {
    $_SESSION = array();
    session_destroy();

    $message = "You have been logged out successfully.";
}

// Login
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Valid credentials
    if ($username == "admin" && $password == "1234") {

        // Regenerate session ID for security
        session_regenerate_id(true);

        // Create session
        $_SESSION['username'] = $username;

        $message = "Login successful.";
    } 
    else {
        $error = "Invalid username or password.";
    }
}

// Protected page validation
if (isset($_GET['dashboard'])) {

    if (!isset($_SESSION['username'])) {
        $error = "Unauthorized access. Please login first.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Login System</title>
</head>

<body>

<?php

// Show dashboard only for logged-in user
if (isset($_GET['dashboard']) && isset($_SESSION['username'])) {
?>

    <h2>Dashboard</h2>

    <p style="color:green;">
        Login successful.
    </p>

    <p>
        Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>
    </p>

    <p>You are authorized to access this page.</p>

    <a href="practical_8.php?logout=1">Logout</a>

<?php
}
else {
?>

    <h2>Secure Login</h2>

    <?php
    if ($message != '') {
        echo "<p style='color:green;'>$message</p>";
    }

    if ($error != '') {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>

    <form method="post" action="practical_8.php">

        Username:
        <input type="text" name="username" required>
        <br><br>

        Password:
        <input type="password" name="password" required>
        <br><br>

        <input type="submit" name="login" value="Login">

    </form>

<?php
}
?>

</body>
</html>