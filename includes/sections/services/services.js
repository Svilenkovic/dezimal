// Services Section JavaScript
function initServicesSection() {
    initServicesScroll();
}

// Add smooth scroll for services section links
function initServicesScroll() {
    const servicesLinks = document.querySelectorAll('a[href="#services"]');
    
    servicesLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const servicesSection = document.querySelector('.services-section');
            if (servicesSection) {
                servicesSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Initialize services section when DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initServicesSection);
} else {
    initServicesSection();
}
