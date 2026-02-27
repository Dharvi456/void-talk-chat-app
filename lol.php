<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index1.php");
    exit();
}

if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
    header("Location: index1.php");
    exit();
}
if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];

    file_put_contents("user.txt", $_SESSION['username'] . "\n", FILE_APPEND);

    header("Location: index1.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Void Talk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">

<div class="login-card">
    <h1 class="logo">VOID TALK</h1>
    <p class="tagline">enter the void ✨</p>

    <form method="POST" class="input-card">
        <input type="text" name="username" placeholder="Enter your name" required>
        <button type="submit">Enter Chat</button>
    </form>
</div>

</body>

</body>