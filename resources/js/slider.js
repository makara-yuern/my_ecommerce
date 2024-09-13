document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('#image-slider .slide');
    let currentSlide = 0;
    
    function showNextSlide() {
        slides[currentSlide].classList.remove('active');
        slides[currentSlide].classList.add('hidden');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.remove('hidden');
        slides[currentSlide].classList.add('active');
    }
    
    slides[currentSlide].classList.remove('hidden');
    slides[currentSlide].classList.add('active');
    
    setInterval(showNextSlide, 5000);
});
