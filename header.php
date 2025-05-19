<?php if (!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sucaad App</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Sucaad Healthcare System</h1>
            <?php if (isset($_SESSION['user'])): ?>
                <p><a href="logout.php">Logout</a></p>
            <?php endif; ?>
        </header>
        <main>
