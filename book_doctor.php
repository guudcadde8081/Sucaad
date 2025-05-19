<?php
include 'auth_check.php';
include 'header.php';
require 'config/db.php';

if ($_SESSION['user']['role'] !== 'patient') {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM doctors");
$doctors = $stmt->fetchAll();
?>

<h2>Raadi Dhakhtar</h2>

<div class="doctor-list">
    <?php foreach ($doctors as $doc): ?>
    <div class="doctor-card">
        <div class="doctor-card-header">
            <img src="<?= htmlspecialchars($doc['image']) ?>" class="doctor-photo" alt="Doctor">

            <div class="doctor-info-block">
                <h3><?= htmlspecialchars($doc['name']) ?></h3>
                <p><?= htmlspecialchars($doc['experience']) ?> Sanooyin khibrad ah</p>
                <div class="doctor-profile">
                    <a href="#" class="profile-btn">Eeg profileka</a>
                </div>
            </div>

            <div class="rating">⭐ 0.0</div>
        </div>

        <hr>

        <div class="doctor-meta">
            <p><strong>Takhasus:</strong> <?= htmlspecialchars($doc['specialty']) ?></p>
            <p><strong>Luuqad:</strong> <?= htmlspecialchars($doc['language']) ?></p>
            <p><strong>Qarashka:</strong> $<?= number_format($doc['fee'], 2) ?></p>
        </div>

        <div class="doctor-action">
            <a href="book_appointment.php?doctor_id=<?= $doc['id'] ?>" class="btn-book">Qabso ballan</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

</main>
</div>
</body>
</html>
