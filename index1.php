<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: lol.php");
    exit();
}
if (isset($_POST['message']) && !empty($_POST['message'])) {

    $username = $_SESSION['username'];
    $message = $_POST['message'];

    $data = $username . ": " . $message . "\n";

    file_put_contents("chat.txt", $data, FILE_APPEND);
}



if (isset($_POST['clear'])) {
    file_put_contents($chatFile, "");
}

if (isset($_POST['delete_last'])) {
    if (file_exists($chatFile)) {
        $lines = file($chatFile);
        array_pop($lines);
        file_put_contents($chatFile, implode("", $lines));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>MY CHAT SYSTEM</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<form method="POST">
    <h1 class="title">VOID TALK</h1>
    <div class="chat-input">
    <input type="text" name="message" placeholder="Type message...">
    <button type="submit">Send</button>
</div>
<div id="chat-box">
<?php
if (file_exists("chat.txt")) {
    echo nl2br(file_get_contents("chat.txt" ));
}
?>
</div>

<form method="POST">
    <button name="clear" type="submit">Clear Chat</button>
</form>

<form method="POST">
    <button name="delete_last" type="submit">Delete Last</button>
</form>
<div class="chat-header">
    <span class="chat-logo">VOID TALK</span>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>