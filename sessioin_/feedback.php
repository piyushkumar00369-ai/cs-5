<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login_secure.php?message=unauthorized");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $feedback = trim($_POST['feedback'] ?? '');
    $rating = trim($_POST['rating'] ?? '');

    if($name != "" && $email != "" && $feedback != "" && $rating != ""){
        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $safeFeedback = htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8');

        echo "Thank you for your feedback, " . $safeName;
        echo "<br>";
        echo "<a href='secure_dashboard.php'>Back to Dashboard</a>";
    }
    else{
        echo "Please fill all fields";
        echo "<br><br>";
        ?>
        <form method="POST">
            Name: <input type="text" name="name"><br><br>
            Email: <input type="email" name="email"><br><br>
            Feedback: <textarea name="feedback" rows="5" cols="40"></textarea><br><br>
            Rating: <select name="rating">
                <option>Select Rating</option>
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Good</option>
                <option value="3">3 - Average</option>
                <option value="2">2 - Poor</option>
                <option value="1">1 - Very Poor</option>
            </select><br><br>
            <input type="submit" value="Submit">
        </form>
        <?php
    }
}
else{
    ?>
    <h3>Feedback Form</h3>
    Welcome <?php echo htmlspecialchars($_SESSION['username']); ?><br><br>
    <form method="POST">
        Name: <input type="text" name="name"><br><br>
        Email: <input type="email" name="email"><br><br>
        Feedback: <textarea name="feedback" rows="5" cols="40"></textarea><br><br>
        Rating: <select name="rating">
            <option>Select Rating</option>
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Good</option>
            <option value="3">3 - Average</option>
            <option value="2">2 - Poor</option>
            <option value="1">1 - Very Poor</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="secure_dashboard.php">Back to Dashboard</a>
    <?php
}

?>