const form = document.querySelector("form");
const statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e) => {
    e.preventDefault();
    statusTxt.style.color = "#0D6EFD";
    statusTxt.style.display = "block";
    statusTxt.innerText = "Sending your message...";
    form.classList.add("disabled");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "message.php", true);

    xhr.onload = () => {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.status === "success") {
                    form.reset();
                    setTimeout(() => {
                        statusTxt.style.display = "none";
                    }, 3000);
                } else {
                    statusTxt.style.color = "red";
                }
                statusTxt.innerText = response.message;
            } else {
                statusTxt.style.color = "red";
                statusTxt.innerText = "Failed to send your message!";
            }
        }
        form.classList.remove("disabled");
    };

    xhr.onerror = () => {
        statusTxt.style.color = "red";
        statusTxt.innerText = "An error occurred. Please try again later.";
        form.classList.remove("disabled");
    };

    let formData = new FormData(form);
    xhr.send(formData);
};
