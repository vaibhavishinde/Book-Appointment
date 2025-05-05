<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];
$provider_id = $_POST['provider_id'];
$date = $_POST['appointment_date'];
$time = $_POST['appointment_time'];

if (mysqli_query($conn, "INSERT INTO appointments (user_id, provider_id, appointment_date, appointment_time)
VALUES ('$user_id', '$provider_id', '$date', '$time')")) {
    echo json_encode(['status' => 'success', 'message' => 'Appointment booked successfully!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to book appointment.']);
}
?>
