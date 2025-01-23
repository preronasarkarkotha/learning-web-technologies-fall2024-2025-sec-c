document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("signupForm");
    const messageContainer = document.getElementById("signup-message");
 
    form.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent form submission
 
        const formData = new FormData(form);
 
        // Client-side validation
        const password = formData.get("createpassword");
        const confirmPassword = formData.get("confirmpassword");
 
        if (password !== confirmPassword) {
            displayMessage("Passwords do not match!", "error");
            return;
        }
 
        // Send form data via AJAX
        fetch("control/signup-handler.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    displayMessage("Sign-up successful!", "success");
                    form.reset();
                    setTimeout(() => {
                        window.location.href = "signin.php";
                    }, 2000);
                } else {
                    displayMessage(data.error, "error");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                displayMessage("An error occurred. Please try again.", "error");
            });
    });
 
    function displayMessage(message, type) {
        messageContainer.textContent = message;
        messageContainer.className = `alert__message ${type}`;
    }
});