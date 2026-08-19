<?php
$name = '';
$feedback = '';
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($submitted) {
    $name = trim($_POST['name'] ?? '');
    $feedback = trim($_POST['feedback'] ?? '');
}

$safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$safeFeedback = htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8');

// Direct output is unsafe because a user could submit HTML or JavaScript.
// echo $name;
// echo $feedback;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student feedback</title>
</head>
<body>
    <h2>Student Feedback Form</h2>
    <form method="post">
        <label>Student Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label>Feedback:</label>
        <textarea name="feedback" rows="5" cols="40" required></textarea><br><br>

        <button type="submit" value="Submit Feedback">Submit Feedback</button>
</form>
<?php if ($submitted): ?>
        <hr>
        <h3>Submitted Feedback</h3>
        <p><b>Student:</b> <?= $safeName ?></p>
        <p><b>Feedback:</b> <?= nl2br($safeFeedback) ?></p>
        <p>Special characters were encoded safely.</p>
        <p><b>Encoded feedback:</b> <?= $safeFeedback ?></p>
<?php endif; ?>
</body>
</html>

    