<?php
$name = '';
$email = '';
$age = '';
$name_error = '';
$email_error = '';
$age_error = '';

if (isset($_POST['submit'])) {
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$age = trim($_POST['age']);

	if ($name === '') {
		$name_error = 'Name is required';
	}

	if ($email === '') {
		$email_error = 'Email is required';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email_error = 'Enter a valid email';
	}

	if ($age === '') {
		$age_error = 'Age is required';
	} elseif (!is_numeric($age)) {
		$age_error = 'Age must be a number';
	} elseif ($age < 5 || $age > 100) {
		$age_error = 'Age must be between 5 and 100';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
</head>
<body>
	<h2>Student Information Form</h2>
	<form method="post">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>"><br>
		<span><?php echo $name_error; ?></span><br>
		<br>

		<label for="email">Email:</label>
		<input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"><br>
		<span><?php echo $email_error; ?></span><br>
		<br>

		<label for="age">Age:</label>
		<input type="text" name="age" id="age" value="<?php echo htmlspecialchars($age); ?>"><br>
		<span><?php echo $age_error; ?></span><br>
		<br>

		<button type="submit" name="submit">Submit</button>
	</form>

	<?php if ($name_error == '' && $email_error == '' && $age_error == '' && isset($_POST['submit'])): ?>
		<h3>Submitted Information</h3>
		<p>Name: <?php echo htmlspecialchars($name); ?></p>
		<p>Email: <?php echo htmlspecialchars($email); ?></p>
		<p>Age: <?php echo htmlspecialchars($age); ?></p>
	<?php endif; ?>
</body>
</html>
