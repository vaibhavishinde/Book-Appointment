<?php session_start(); ?>
<link rel="stylesheet" href="style.css">

<h2>Welcome to Appointment Booking App</h2>

<?php if (!isset($_SESSION['user_id'])): ?>
    <a href="register.php">Register</a> | <a href="login.php">Login</a>
<?php else: ?>
    <a href="book_appo.php">Book Appointment</a> |
    <a href="view_appo.php">View My Appointments</a> |
    <a href="logout.php">Logout</a>
<?php endif; ?>
