<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login_secure.php?message=unauthorized");
    exit();
}

$message = $_GET['message'] ?? '';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<?php if($message === 'success'): ?>
    <p style="color: green;">Login successful!</p>
<?php endif; ?>

<p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?></p>

<p>You are logged in!</p>

<a href="logout_secure.php">Logout</a> | 
<a href="feedback.php">Feedback</a>

</body>
</html>

