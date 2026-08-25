<?php

$name = "";
$feedback = "";
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"] ?? "");
    $feedback = trim($_POST["feedback"] ?? "");

    $submitted = true;

    // Convert special characters into safe HTML
    $safeName = htmlspecialchars($name, ENT_QUOTES, "UTF-8");
    $safeFeedback = htmlspecialchars($feedback, ENT_QUOTES, "UTF-8");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Feedback System</title>
</head>

<body>

<h2>Student Feedback System</h2>

<form method="post">

    Student Name:<br>
    <input type="text" name="name" required>

    <br><br>

    Feedback:<br>
    <textarea name="feedback" rows="5" cols="40" required></textarea>

    <br><br>

    <button type="submit">Submit Feedback</button>

</form>

<?php if ($submitted) { ?>

    <hr>

    <h3>Submitted Feedback</h3>

    <p>
        <b>Student Name:</b>
        <?= $safeName ?>
    </p>

    <p>
        <b>Feedback:</b><br>
        <?= nl2br($safeFeedback) ?>
    </p>

    <p>
        <b>Security:</b>
        XSS input was safely encoded using htmlspecialchars().
    </p>

<?php } ?>

</body>
</html>