// Modal for event details
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('detailsModal');
    const modalContent = document.getElementById('eventDetails');
    const closeBtn = modal.querySelector('.close');

    document.querySelectorAll('.details-btn').forEach(button => {
        button.addEventListener('click', () => {
            modalContent.textContent = button.getAttribute('data-details');
            modal.style.display = 'block';
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', event => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});

// Form validation
document.getElementById('addEventForm')?.addEventListener('submit', (e) => {
    const title = document.getElementById('title').value.trim();
    const eventName = document.getElementById('event_name').value.trim();
    const details = document.getElementById('details').value.trim();
    const picture = document.getElementById('picture').files[0];

    if (!title || !eventName || !details || !picture) {
        e.preventDefault();
        alert('All fields are required!');
    }
});
