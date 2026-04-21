class AnimationManager {
    constructor() {
        this.observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        this.init();
    }

    init() {
        this.setupLoadingScreen();
        this.setupScrollAnimations();
        this.setupPageTransitions();
        this.setupStaggerAnimations();
        this.setupHoverEffects();
        this.setupFormAnimations();
    }

    setupLoadingScreen() {
        const loadingScreen = document.querySelector('.loading-screen');
        
        if (!loadingScreen) {
            const newLoadingScreen = document.createElement('div');
            newLoadingScreen.className = 'loading-screen';
            newLoadingScreen.innerHTML = `
                <div class="text-center">
                    <div class="loading-spinner"></div>
                    <div class="loading-text">Učitavanje...</div>
                </div>
            `;
            document.body.appendChild(newLoadingScreen);
            return;
        }

        setTimeout(() => {
            if (loadingScreen && !loadingScreen.classList.contains('hidden')) {
                loadingScreen.classList.add('hidden');
                setTimeout(() => {
                    if (loadingScreen) {
                        loadingScreen.style.display = 'none';
                    }
                    this.triggerPageLoad();
                }, 500);
            }
        }, 3000);

        setTimeout(() => {
            if (loadingScreen) {
                loadingScreen.classList.add('hidden');
                setTimeout(() => {
                    if (loadingScreen) {
                        loadingScreen.style.display = 'none';
                    }
                    this.triggerPageLoad();
                }, 500);
            }
        }, 1500);
    }

    setupScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    this.triggerStaggerAnimation(entry.target);
                    
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -30px 0px'
        });

        const animatedElements = document.querySelectorAll(
            '.animate-on-scroll, .section-animate, .card-animate, .text-animate, .btn-animate, .icon-animate'
        );

        animatedElements.forEach(el => {
            observer.observe(el);
        });
    }

    setupPageTransitions() {
        const pageContent = document.querySelector('body');
        if (pageContent) {
            pageContent.classList.add('page-transition');
        }
    }

    triggerPageLoad() {
        const pageContent = document.querySelector('.page-transition');
        
        if (pageContent) {
            setTimeout(() => {
                pageContent.classList.add('loaded');
            }, 100);
        }

        this.animateHeader();
        this.animateHero();
    }

    animateHeader() {
        const header = document.querySelector('.header');
        
        if (header) {
            header.classList.add('animate-fade-in-down');
        }
    }

    animateHero() {
        const heroTitle = document.querySelector('.hero-title');
        
        if (heroTitle) {
            heroTitle.classList.add('animate-fade-in-up', 'stagger-1');
        }

        const heroSubtitle = document.querySelector('.hero-subtitle');
        
        if (heroSubtitle) {
            heroSubtitle.classList.add('animate-fade-in-up', 'stagger-2');
        }

        const heroButtons = document.querySelectorAll('.hero-btn');
        
        heroButtons.forEach((btn, index) => {
            btn.classList.add('animate-fade-in-up', `stagger-${3 + index}`);
        });
    }

    setupStaggerAnimations() {
        const staggerContainers = document.querySelectorAll('.stagger-container');
        staggerContainers.forEach(container => {
            const children = container.children;
            Array.from(children).forEach((child, index) => {
                child.classList.add(`stagger-${index + 1}`);
                child.style.setProperty('--card-index', index);
            });
        });

        // Setup button indices
        const heroButtons = document.querySelectorAll('.hero-btn');
        heroButtons.forEach((btn, index) => {
            btn.style.setProperty('--btn-index', index);
        });

        // Setup counter indices
        const counters = document.querySelectorAll('.counter');
        counters.forEach((counter, index) => {
            counter.style.setProperty('--counter-index', index);
        });

        // Setup partner indices
        const partners = document.querySelectorAll('.footer-partner');
        partners.forEach((partner, index) => {
            partner.style.setProperty('--partner-index', index);
        });

        // Setup link indices
        const links = document.querySelectorAll('.footer-link');
        links.forEach((link, index) => {
            link.style.setProperty('--link-index', index);
        });

        // Setup nav indices
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach((link, index) => {
            link.style.setProperty('--nav-index', index);
        });

        // Setup mobile nav indices
        const mobileLinks = document.querySelectorAll('.mobile-nav-link');
        mobileLinks.forEach((link, index) => {
            link.style.setProperty('--mobile-index', index);
        });
    }

    triggerStaggerAnimation(container) {
        if (container.classList.contains('stagger-container')) {
            const children = container.children;
            Array.from(children).forEach((child, index) => {
                setTimeout(() => {
                    child.classList.add('visible');
                }, index * 100);
            });
        }
    }

    setupHoverEffects() {
        // Add hover classes to elements
        const cards = document.querySelectorAll('.service-card, .about-card');
        cards.forEach(card => {
            card.classList.add('hover-lift');
        });

        const buttons = document.querySelectorAll('.btn, button');
        buttons.forEach(btn => {
            btn.classList.add('hover-scale');
        });

        const icons = document.querySelectorAll('.service-icon, .feature-icon');
        icons.forEach(icon => {
            icon.classList.add('hover-glow');
        });
    }

    // Utility methods
    addAnimationClass(element, className, delay = 0) {
        setTimeout(() => {
            element.classList.add(className);
        }, delay);
    }

    removeAnimationClass(element, className, delay = 0) {
        setTimeout(() => {
            element.classList.remove(className);
        }, delay);
    }

    // Counter animation for statistics
    animateCounter(element, target, duration = 2000) {
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
                // Dodaj "+" znak na kraju brojanja
                element.textContent = Math.floor(current) + '+';
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }

    // Progress bar animation
    animateProgressBar(element, targetWidth) {
        element.style.width = '0%';
        setTimeout(() => {
            element.style.width = targetWidth + '%';
        }, 100);
    }

    // Form submission animations
    setupFormAnimations() {
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.classList.add('loading');
                    submitBtn.disabled = true;
                }
            });
        });
    }

    // Success/Error animations
    showSuccessAnimation(element) {
        element.classList.add('success-animation');
        setTimeout(() => {
            element.classList.remove('success-animation');
        }, 600);
    }

    showErrorAnimation(element) {
        element.classList.add('error-animation');
        setTimeout(() => {
            element.classList.remove('error-animation');
        }, 600);
    }
    
    // Utility function to make footer visible
    makeFooterVisible() {
        const footer = document.querySelector('footer');
        if (footer) {
            footer.style.opacity = '1';
            footer.style.visibility = 'visible';
            footer.style.display = 'block';
            footer.style.position = 'relative';
            footer.style.zIndex = '1000';
        }
        
        const footerElements = document.querySelectorAll('.footer-copyright, .footer-partners-title, .footer-partner, .footer-link');
        footerElements.forEach(element => {
            element.style.opacity = '1';
            element.style.visibility = 'visible';
        });
        
        return footerElements.length;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (!document.querySelector('.loading-screen')) {
        const loadingScreen = document.createElement('div');
        loadingScreen.className = 'loading-screen';
        loadingScreen.innerHTML = `
            <div class="text-center">
                <div class="loading-spinner"></div>
                <div class="loading-text">Učitavanje...</div>
            </div>
        `;
        document.body.appendChild(loadingScreen);
    }
    
    window.animationManager = new AnimationManager();
    
    if (window.animationManager) {
        window.animationManager.makeFooterVisible();
    }
    
    const navLinks = document.querySelectorAll('a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

window.addEventListener('load', () => {
    const loadingScreen = document.querySelector('.loading-screen');
    
    if (loadingScreen && !loadingScreen.classList.contains('hidden')) {
        loadingScreen.classList.add('hidden');
        setTimeout(() => {
            if (loadingScreen) {
                loadingScreen.style.display = 'none';
            }
            if (window.animationManager) {
                window.animationManager.triggerPageLoad();
            }
        }, 500);
    }

    setTimeout(() => {
        if (window.animationManager) {
            window.animationManager.makeFooterVisible();
        }
    }, 2000);

    const images = document.querySelectorAll('img');
    images.forEach(img => {
        if (img.complete) {
            img.classList.add('animate-scale-in');
        } else {
            img.addEventListener('load', () => {
                img.classList.add('animate-scale-in');
            });
        }
    });

    const counters = document.querySelectorAll('.counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.target);
                if (window.animationManager) {
                    window.animationManager.animateCounter(entry.target, target);
                }
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
});
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallaxElements = document.querySelectorAll('.parallax');
    
    parallaxElements.forEach(element => {
        const speed = element.dataset.speed || 0.5;
        const yPos = -(scrolled * speed);
        element.style.transform = `translateY(${yPos}px)`;
    });
});
