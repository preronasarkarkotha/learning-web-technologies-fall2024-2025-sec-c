document.getElementById("searchForm").addEventListener("submit", function (e) {
    const queryInput = document.getElementById("query").value.trim();

    if (queryInput === "") {
        e.preventDefault(); // Prevent form submission
        alert("Search query cannot be empty. Please enter a valid search term.");
        return false;
    }

    if (queryInput.length < 3) {
        e.preventDefault(); // Prevent form submission
        alert("Search query must be at least 3 characters long.");
        return false;
    }

    // Add more validations as needed
    return true;
});
