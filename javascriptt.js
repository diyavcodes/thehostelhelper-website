function navigateToNewPage() {
    window.location.href = 'javascript4.html';
}
function navigateToNewPage1() {
    window.location.href = 'pghostel.html'
}
function navigateToNewPage2() {
    window.location.href = 'login.html'; 
}
function navigateToNewPage3() {
    window.location.href = 'movers.html'; 
}
document.addEventListener("DOMContentLoaded", () => {
    const options = {
        root: null, // use the viewport as the root
        rootMargin: '0px',
        threshold: 0.1 // trigger when 10% of the element is visible
    };
  
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                const animationClass = element.dataset.animationClass;
  
                if (animationClass) {
                    // Ensure the animation class is removed first
                    element.classList.remove(animationClass);
                    // Force reflow to reset the animation
                    void element.offsetWidth; 
                    // Add the animation class
                    element.classList.add(animationClass);
                }
            }
        });
    }, options);
  
    // Select elements to observe
    document.querySelectorAll('[data-animation-class]').forEach(element => {
        observer.observe(element);
    });
  });
