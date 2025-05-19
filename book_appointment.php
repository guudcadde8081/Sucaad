<?php
include 'auth_check.php';
include 'header.php';
require 'config/db.php';

if ($_SESSION['user']['role'] !== 'patient') {
    header("Location: login.php");
    exit;
}

$doctor_id = $_GET['doctor_id'] ?? null;
if (!$doctor_id) {
    echo "<p>Doctor not found.</p>";
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM doctors WHERE id = ?");
$stmt->execute([$doctor_id]);
$doctor = $stmt->fetch();

if (!$doctor) {
    echo "<p>Doctor not found.</p>";
    exit;
}

// Hardcoded slots per session
$slots = [
    'subax' => ['08:00 AM', '08:20 AM', '08:40 AM', '09:00 AM'],
    'galab' => [],
    'fiid'  => ['04:00 PM', '04:20 PM', '04:40 PM', '05:00 PM'],
];
?>

<div class="appointment-container">
    <img src="<?= htmlspecialchars($doctor['image']) ?>" class="profile-pic" alt="Doctor Photo">
    <h2><?= htmlspecialchars($doctor['name']) ?></h2>

    <div class="tabs">
        <button class="tab active">Maanta</button>
        <button class="tab">Berri</button>
        <button class="tab">Arbaco</button>
    </div>

    <div class="session-group">
        <h3>Subax <span><?= count($slots['subax']) ?> Kaadh</span></h3>
        <div class="slot-row">
            <?php foreach ($slots['subax'] as $slot): ?>
                <div class="slot"><?= $slot ?></div>
            <?php endforeach; ?>
        </div>

        <h3>Galab <span><?= count($slots['galab']) ?> Kaadh</span></h3>
        <?php if (empty($slots['galab'])): ?>
            <p class="disabled">Waqtigan lama heli karo</p>
        <?php endif; ?>

        <h3>Fiid <span><?= count($slots['fiid']) ?> Kaadh</span></h3>
        <div class="slot-row">
            <?php foreach ($slots['fiid'] as $slot): ?>
                <div class="slot"><?= $slot ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</main>
</div>
</body>
</html>
