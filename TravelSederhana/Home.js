// scripts.js

// Smooth scrolling for navigation links
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function (e) {
        const targetElement = document.querySelector(this.getAttribute('href'));
        if (targetElement) {
            e.preventDefault();
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// Event listener for DOMContentLoaded
window.addEventListener('DOMContentLoaded', (event) => {
    // Carousel gallery
    const items = document.querySelectorAll('.carousel-item');
    items.forEach(item => {
        item.addEventListener('click', () => {
            items.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });

    // Title color change on hover
    const title = document.getElementById('title');
    title.addEventListener('mouseover', () => title.style.color = '#28a745');
    title.addEventListener('mouseout', () => title.style.color = '#007bff');

    // Subtitle color change on hover
    const subtitle = document.getElementById('subtitle');
    subtitle.addEventListener('mouseover', () => subtitle.style.color = '#17a2b8');
    subtitle.addEventListener('mouseout', () => subtitle.style.color = '#6c757d');
});
