<?php
$conn = mysqli_connect('localhost', 'root', '', 'task');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
