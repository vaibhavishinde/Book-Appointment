<?php
session_start();
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
    } else {
        echo "Invalid credentials";
    }
}

?>
<link rel="stylesheet" href="style.css">
<form method="POST">
    <h2>Login Now</h2>
    Email: <input name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
    <a href="index.php">← Go Back</a>
</form>
