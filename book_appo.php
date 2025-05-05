<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$providers = mysqli_query($conn, "SELECT * FROM service_providers");
?>
<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Book an Appointment</h2>
    <form id="ajax-book-form" method="POST">
        <label>Provider:</label>
        <select id="provider_id" name="provider_id" required>
            <?php while ($p = mysqli_fetch_assoc($providers)) { ?>
                <option value="<?= $p['id'] ?>"><?= $p['name'] ?> - <?= $p['service'] ?></option>
            <?php } ?>
        </select><br>
        <label>Date:</label><input type="date" id="appointment_date" name="appointment_date" required><br>
        <label>Time:</label><input type="time" id="appointment_time" name="appointment_time" required><br>
        <button type="submit">Book Appointment</button>
    </form>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('ajax-book-form').addEventListener('submit', function(e) {
        e.preventDefault();

    
        const provider_id = document.getElementById('provider_id').value;
        const date = document.getElementById('appointment_date').value;
        const time = document.getElementById('appointment_time').value;

    
        fetch('submit_appo.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `provider_id=${provider_id}&appointment_date=${date}&appointment_time=${time}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                window.location.href = 'index.php'; 
            } else {
                alert(data.message);
            }
        })
        .catch(err => {
            alert('An error occurred: ' + err);
        });
    });
});
</script>
