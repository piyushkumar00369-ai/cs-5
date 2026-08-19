<?php
$name = '';
$email = '';
$age = '';
$errors = array();
$valid = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = trim($_POST['name'] ?? '');
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '';
	$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);

	if ($name === '') {
		$errors['name'] = 'Name is required.';
	} elseif (!preg_match("/^[A-Za-z .'-]+$/", $name)) {
		$errors['name'] = 'Enter a valid name.';
	}

	if ($email === '') {
		$errors['email'] = 'Email is required.';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Enter a valid email address.';
	}

	if ($age === false || $age === null) {
		$errors['age'] = 'Age is required and must be a number.';
	} elseif ($age < 5 || $age > 100) {
		$errors['age'] = 'Age must be between 5 and 100.';
	}

	$valid = count($errors) === 0;
}

$safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$safeAge = htmlspecialchars((string) $age, ENT_QUOTES, 'UTF-8');
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
		<input type="text" name="name" id="name" value="<?= $safeName ?>"><br>
		<?php if (isset($errors['name'])): ?>
			<span><?= htmlspecialchars($errors['name'], ENT_QUOTES, 'UTF-8') ?></span><br>
		<?php endif; ?>
		<br>

		<label for="email">Email:</label>
		<input type="text" name="email" id="email" value="<?= $safeEmail ?>"><br>
		<?php if (isset($errors['email'])): ?>
			<span><?= htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8') ?></span><br>
		<?php endif; ?>
		<br>

		<label for="age">Age:</label>
		<input type="text" name="age" id="age" value="<?= $safeAge ?>"><br>
		<?php if (isset($errors['age'])): ?>
			<span><?= htmlspecialchars($errors['age'], ENT_QUOTES, 'UTF-8') ?></span><br>
		<?php endif; ?>
		<br>

		<button type="submit">Submit</button>
	</form>

	<?php if ($valid): ?>
		<h3>Submitted Information</h3>
		<p>Name: <?= $safeName ?></p>
		<p>Email: <?= $safeEmail ?></p>
		<p>Age: <?= $safeAge ?></p>
	<?php endif; ?>
</body>
</html>
