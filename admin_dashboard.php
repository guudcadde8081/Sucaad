<?php
include 'auth_check.php';
include 'header.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<h2>Admin Dashboard</h2>
<p>Welcome, <?= $_SESSION['user']['name'] ?>!</p>
<ul>
    <li><a href="#">All Users</a></li>
    <li><a href="#">Appointments Overview</a></li>
    <li><a href="#">System Reports</a></li>
</ul>

<?php include 'footer.php'; ?>

