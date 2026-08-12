<html>
<head>
    <title>Student feedback</title>
</head>
<body>
    <h2>Student Feedback Form</h2>
    <form method="post">
        <label>Student Name:</label>
        <input type="text" name="name"="name" required><br><br>

        <label>Feedback:</label>
        <textarea name="feedback" rows="5" cols="40" required></textarea><br><br>

        <button type="submit" value="Submit Feedback">Submit Feedback</button>
</form>
<?php
if (isset($_POST['name']) && isset($_POST['feedback'])) {
    
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];

    echo "<hr>";
echo "<h3> submitted feedback</h3>";
echo "<p><b>Student:</b> " . $name . "</p>";
echo "<p><b>Feedback:</b> " . $feedback . "</p>";
}
$safeName=htmlspecialchars(
  $name,
  ENT_QUOTES,
  'UTF-8'
);
 echo "<p><b>Student:</b>:&safename</p>";
 echo "<p><b>Feedback:</b>&safeFeedname</p>"; 
?>
</body>
</html>

    