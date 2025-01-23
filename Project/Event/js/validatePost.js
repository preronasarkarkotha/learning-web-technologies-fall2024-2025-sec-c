document.getElementById('addPostForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submission

    // Get form values
    const title = document.querySelector('input[name="title"]').value.trim();
    const category = document.querySelector('select[name="category"]').value;
    const body = document.querySelector('textarea[name="body"]').value.trim();
    const thumbnail = document.querySelector('input[name="thumbnail"]').files.length;

    const errorMessage = document.getElementById('errorMessage');
    errorMessage.style.display = 'none';

    // Validate fields
    if (!title || !category || !body || thumbnail === 0) {
        errorMessage.style.display = 'block';
        errorMessage.textContent = 'All fields are required, and a thumbnail must be uploaded.';
        return;
    }

    // If validation passes, submit the form
    this.submit();
});
