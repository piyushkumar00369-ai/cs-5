<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login_secure.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);

session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>

<h2>Logout</h2>

<p>Goodbye <?php echo $username; ?>!</p>
<p>You have been logged out.</p>

<a href="login_secure.php">Login Again</a>

</body>
</html>

