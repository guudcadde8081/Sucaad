<?php
session_start();
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        switch ($user['role']) {
            case 'admin':
                header("Location: admin_dashboard.php");
                break;
            case 'doctor':
                header("Location: doctor_dashboard.php");
                break;
            case 'patient':
                header("Location: patient_dashboard.php");
                break;
        }
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>

<?php include 'header.php'; ?>

<h2>Login</h2>
<?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
<form method="POST">
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="signup.php">Sign up as a patient</a></p>

<?php include 'footer.php'; ?>
