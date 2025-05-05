<?php
session_start();
include 'connect.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$user_id = $_SESSION['user_id'];
$res = mysqli_query($conn, "
    SELECT a.*, s.name as provider_name, s.service
    FROM appointments a
    JOIN service_providers s ON a.provider_id = s.id
    WHERE a.user_id = '$user_id'
");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="btn-group">
        <a href="index.php" class="btn">← Go Back</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>

    <h2>My Appointments</h2>
    <table>
        <tr><th>Provider</th><th>Service</th><th>Date</th><th>Time</th></tr>
        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $row['provider_name'] ?></td>
                <td><?= $row['service'] ?></td>
                <td><?= $row['appointment_date'] ?></td>
                <td><?= $row['appointment_time'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
