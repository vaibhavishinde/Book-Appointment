<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    mysqli_query($conn, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
    header('Location: login.php');
}
?>
<form method="POST">
<link rel="stylesheet" href="style.css">

    Name: <input name="name" required><br>
    Email: <input name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
    <a href="index.php">← Go Back</a>
</form>
