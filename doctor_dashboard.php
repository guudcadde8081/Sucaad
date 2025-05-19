<?php
include 'auth_check.php';
include 'header.php';

if ($_SESSION['user']['role'] !== 'doctor') {
    header("Location: login.php");
    exit;
}
?>

<h2>Doctor Dashboard</h2>
<p>Welcome, Dr. <?= $_SESSION['user']['name'] ?>!</p>
<ul>
    <li><a href="#">Today's Appointments</a></li>
    <li><a href="#">Manage Schedule</a></li>
    <li><a href="#">Patient Records</a></li>
</ul>

<?php include 'footer.php'; ?>
