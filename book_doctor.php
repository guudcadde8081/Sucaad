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

<h2>Qabso Ballan Dhakhtar</h2>

<div class="dashboard-grid">
    <?php foreach ($doctors as $doc): ?>
    <div class="dashboard-card">
        <img src="<?= htmlspecialchars($doc['image']) ?>" alt="Doctor Icon">
        <h3><?= htmlspecialchars($doc['name']) ?></h3>
        <p><strong>Takhasus:</strong> <?= htmlspecialchars($doc['specialty']) ?></p>
        <p><strong>Cusbitaal:</strong> <?= htmlspecialchars($doc['hospital']) ?></p>
        <p><strong>Luqad:</strong> <?= htmlspecialchars($doc['language']) ?></p>
        <p><strong>Khidmad:</strong> $<?= number_format($doc['fee'], 2) ?></p>
        <a href="#" class="btn">Qabso Ballan</a>
    </div>
    <?php endforeach; ?>
</div>

</main>
</div>
</body>
</html>
