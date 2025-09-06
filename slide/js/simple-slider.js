// Basic slider without external dependencies
// Cycles through images inside .simple-slider every 5 seconds

document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.simple-slider');
    if (!slider) return;

    const slides = slider.querySelectorAll('img');
    let index = 0;

    slides.forEach((img, i) => {
        if (i === 0) {
            img.classList.add('active');
        } else {
            img.classList.remove('active');
        }
    });

    setInterval(() => {
        slides[index].classList.remove('active');
        index = (index + 1) % slides.length;
        slides[index].classList.add('active');
    }, 5000);
});
