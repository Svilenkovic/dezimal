// About Section JavaScript
function initAboutSection() {
    initAboutScroll();
}

// Add smooth scroll for about section links
function initAboutScroll() {
    const aboutLinks = document.querySelectorAll('a[href="#about"]');
    
    aboutLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const aboutSection = document.querySelector('.about-section');
            if (aboutSection) {
                aboutSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Initialize about section when DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAboutSection);
} else {
    initAboutSection();
}
