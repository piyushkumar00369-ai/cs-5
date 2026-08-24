<?php

session_start();

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if($username == '' || $password == ''){
        $error = "Username and password are required!";
    }
    else if($username == "admin" && $password == "1234"){
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        header("Location: secure_dashboard.php");
        exit();
    }
    else{
        $error = "Invalid username or password!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if($error != ''): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

<p>Username: admin<br>Password: 1234</p>

</body>
</html>
