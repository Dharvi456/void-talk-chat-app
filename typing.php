<?php
$username = $_POST['username'] ?? '';

if (!empty($username)) {
    file_put_contents("typing.txt", $username);
    echo $username . " is typing...";
}
?>