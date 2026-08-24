<?php
session_start();

$error = '';
$message = '';

// Logout
if(isset($_GET['logout'])){
	$_SESSION = array();
	session_destroy();
	$message = 'You have been logged out.';
}

// Login
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username == 'admin' && $password == '1234'){
		// Create a new session ID after login.
		session_regenerate_id(true);
		$_SESSION['username'] = $username;
		$message = 'Login successful.';
	}
	else{
		$error = 'Invalid username or password.';
	}
}

// A dashboard request is allowed only for logged-in users.
if(isset($_GET['dashboard']) && !isset($_SESSION['username'])){
	$error = 'Unauthorized access. Please login first.';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Secure Login System</title>
</head>
<body>
<?php if(isset($_GET['dashboard']) && isset($_SESSION['username'])){ ?>
	<h2>Dashboard</h2>
	<p style="color: green;">Login successful!</p>
	<p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>
	<p>You are logged in.</p>
	<a href="practical_8.php?logout=1">Logout</a>
<?php } else { ?>
	<h2>Login</h2>

	<?php if($message != ''){ ?>
		<p style="color: green;"><?php echo $message; ?></p>
	<?php } ?>

	<?php if($error != ''){ ?>
		<p style="color: red;"><?php echo $error; ?></p>
	<?php } ?>

	<form method="post" action="practical_8.php">
		Username: <input type="text" name="username" required><br><br>
		Password: <input type="password" name="password" required><br><br>
		<input type="submit" name="login" value="Login">
	</form>
<?php } ?>
</body>
</html>
