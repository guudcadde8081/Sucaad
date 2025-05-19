<?php
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone    = $_POST['phone'];
    $role     = 'patient';

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, phone, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $password, $phone, $role]);

    $success = "Signup successful! You can now login.";
}
?>

<?php include 'header.php'; ?>

<h2>Patient Signup</h2>
<?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>
<form method="POST">
    <input name="name" placeholder="Full Name" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <input name="phone" placeholder="Phone" required>
    <button type="submit">Sign Up</button>
</form>

<p>Already have an account? <a href="login.php">Login here</a></p>

<?php include 'footer.php'; ?>
