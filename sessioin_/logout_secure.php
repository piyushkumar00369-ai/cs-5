<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login_secure.php?message=unauthorized");
    exit();
}

$username = $_SESSION['username'];

session_destroy();

if(ini_get('session.use_cookies')){
    $cookie = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>

<h2>Logout</h2>

<p>Goodbye <?php echo htmlspecialchars($username); ?>!</p>
<p>You have been logged out.</p>

<a href="login_secure.php">Login Again</a>

</body>
</html>

