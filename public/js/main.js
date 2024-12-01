

let alert_messages = document.querySelectorAll(".message_section");
console.log(alert_messages);


for (let i = 0; i <= alert_messages.length; i++) {
    if (alert_messages.length > 0) {
        setTimeout(() => {
            alert_messages[i].remove();
        }, 2000);

        alert_messages[i].addEventListener("click", function () {
            alert_messages[i].remove();
        })
    }
}


