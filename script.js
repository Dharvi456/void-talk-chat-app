function sendMessage() {
    let username = document.getElementById("username").value;
    let message = document.getElementById("message").value;

    fetch("send.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "username=" + username + "&message=" + message
    });

    document.getElementById("message").value = "";
}
let typingTimeout;

document.getElementById("message").addEventListener("input", function() {

    fetch("typing.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "username=" + document.getElementById("username").value
    });

    clearTimeout(typingTimeout);

    typingTimeout = setTimeout(() => {
        fetch("stoptyping.php");
    }, 2000);
});

function fetchMessages() {
    fetch("fetch.php")
        .then(response => response.text())
        .then(data => {
            let chatBox = document.getElementById("chat-box");
            chatBox.innerHTML = data;

            let username = document.getElementById("username").value;
            let messages = chatBox.getElementsByClassName("msg");

            for(let msg of messages){
                if(msg.innerHTML.includes(username + ":")){
                    msg.style.textAlign = "right";
                    msg.style.color = "cyan";
                }
            }

            chatBox.scrollTop = chatBox.scrollHeight;
        });
}
function checkTyping(){
    fetch("typing.php")
    .then(res => res.text())
    .then(data => {
        document.getElementById("typing").innerText =
            data ? data + " is typing..." : "";
    });
}

setInterval(checkTyping, 1000);

function clearChat() {
    fetch("clear.php");
}
function deleteLast() {
    fetch("delete.php");
}
if(msg.innerHTML.includes(username + ":")){
    msg.classList.add("self");
}


setInterval(fetchMessages, 2000);