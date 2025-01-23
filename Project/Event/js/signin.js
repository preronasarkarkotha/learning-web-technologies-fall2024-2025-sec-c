document.addEventListener("DOMContentLoaded", () => {
    const signinForm = document.getElementById("signinForm");
    const errorMessage = document.getElementById("error-message");
 
    signinForm.addEventListener("submit", (e) => {
        e.preventDefault(); // Prevent default form submission
 
        // Collect form data
        const formData = new FormData(signinForm);
 
        // Send data via AJAX
        fetch("control/signin-handler.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Redirect to admin/index.php if login is successful
                    window.location.href = "admin/index.php";
                } else {
                    // Display error message
                    errorMessage.style.display = "block";
                    errorMessage.textContent = data.message || "Invalid username or password.";
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                errorMessage.style.display = "block";
                errorMessage.textContent = "An error occurred. Please try again.";
            });
    });
});

