<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login_secure.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?></p>

<p>You are logged in!</p>

<a href="logout_secure.php">Logout</a> | 
<a href="feedback.php">Feedback</a>

</body>
</html>

