<?php

if(isset($_POST['username']) && isset($_POST['message'])) {

    $username = trim($_POST['username']);
    $message = trim($_POST['message']);

    if($username == "" || $message == "") {
        exit();
    }

    $file = "messages.txt";
    $time = date("H:i");

    $data = "<div class='msg'>
                <span class='time'>[$time]</span>
                <strong>$username:</strong> $message
            </div>\n";

    file_put_contents($file, $data, FILE_APPEND);
}

$usersFile = "user.txt";
$users = file_exists($usersFile) ? file_get_contents($usersFile) : "";

if(strpos($users, $username) === false){
                 file_put_contents("messages.txt", 
                "<div class='join'>$username joined the chat</div>\n", 
                 FILE_APPEND);
                file_put_contents($usersFile, $username."\n", FILE_APPEND);
}
$data = "<div class='msg'>
            <span class='time'>[$time]</span>
            <strong>$username:</strong> $message
        </div>\n";


 if(strpos($message, "@") === 0){
    $parts = explode(" ", $message, 2);
    $target = substr($parts[0], 1);
    $privateMsg = $parts[1];

    $data = "<div class='private'>
        (Private) $username → $target: $privateMsg
    </div>\n";
}       
?>