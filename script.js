document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var form = event.target;
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", form.action, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("response").textContent = xhr.responseText;
        }
    };
    xhr.send(formData);
});
