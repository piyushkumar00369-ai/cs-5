<?php
$message = '';
$username = '';
$password = '';
$login_type = $_POST['login_type'] ?? '';

try {
	$conn = new PDO(
		'mysql:host=localhost;dbname=CS-5',
		'root',
		'',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
	);

	$conn->exec("CREATE TABLE IF NOT EXISTS LOGIN_USERS (
		id INT PRIMARY KEY AUTO_INCREMENT,
		username VARCHAR(50) NOT NULL UNIQUE,
		user_password VARCHAR(100) NOT NULL
	)");

	$add_user = $conn->prepare(
		'INSERT IGNORE INTO LOGIN_USERS (username, user_password) VALUES (:username, :user_password)'
	);
	$add_user->execute(array(
		':username' => 'admin',
		':user_password' => 'admin123'
	));

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$username = $_POST['username'] ?? '';
		$password = $_POST['password'] ?? '';

		if ($login_type === 'vulnerable') {
			$sql = "SELECT * FROM LOGIN_USERS WHERE username = '$username' AND user_password = '$password'";
			$result = $conn->query($sql);
			$user = $result->fetch(PDO::FETCH_ASSOC);
		} else {
			$sql = 'SELECT * FROM LOGIN_USERS WHERE username = :username AND user_password = :user_password';
			$statement = $conn->prepare($sql);
			$statement->bindParam(':username', $username);
			$statement->bindParam(':user_password', $password);
			$statement->execute();
			$user = $statement->fetch(PDO::FETCH_ASSOC);
		}

		if ($user) {
			$message = 'Login successful.';
		} else {
			$message = 'Invalid username or password.';
		}
	}
} catch (PDOException $error) {
	$message = 'Database error: ' . $error->getMessage();
}

$safe_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
</head>
<body>
	<h2>Student Login</h2>
	<form method="post">
		<label>Username:</label>
		<input type="text" name="username" required><br><br>

		<label>Password:</label>
		<input type="password" name="password" required><br><br>

		<button type="submit" name="login_type" value="vulnerable">Vulnerable Login</button>
		<button type="submit" name="login_type" value="secure">Secure Login</button>
	</form>

	<?php if ($message !== ''): ?>
		<p><?= $safe_message ?></p>
	<?php endif; ?>

	<p>Test account: admin / admin123</p>
</body>
</html>
