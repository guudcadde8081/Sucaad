<?php
include 'auth_check.php';
include 'header.php';

if ($_SESSION['user']['role'] !== 'patient') {
    header("Location: login.php");
    exit;
}
$name = $_SESSION['user']['name'];
?>

<h2>Soo Dhawoow, <?= htmlspecialchars($name) ?>!</h2>

<div class="dashboard-grid">
    <a href="book_doctor.php" class="dashboard-card">
        <img src="assets/icons/doctor.png" alt="Doctor Icon">
        <span>Qabso Ballan Dhakhtar</span>
    </a>
    
    <a href="#" class="dashboard-card">
        <img src="assets/icons/medicine.png" alt="Medication Icon">
        <span>Daawayntayda</span>
    </a>
</div>

</main>
</div>
</body>
</html>
