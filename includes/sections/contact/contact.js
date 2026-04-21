// Contact Section JavaScript
function initContactSection() {
    initContactForm();
    initContactScroll();
}

function initContactForm() {
    const form = document.getElementById('contactForm');
    if (!form) return;
    
    const submitBtn = form.querySelector('.form-submit');
    
    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!validateForm()) {
            return;
        }
        
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);
        
        // Show loading state using animation manager
        if (window.animationManager) {
            window.animationManager.showSuccessAnimation(submitBtn);
        }
        
        // Simulate form submission (replace with actual endpoint)
        setTimeout(() => {
            // Reset form
            form.reset();
            
            // Show success message
            showFormMessage('Thank you! Your message has been sent successfully.', 'success');
            
            // Reset button
            if (window.animationManager) {
                window.animationManager.showSuccessAnimation(submitBtn);
            }
        }, 2000);
    });
}

function validateForm() {
    const form = document.getElementById('contactForm');
    const inputs = form.querySelectorAll('input[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!validateField(input)) {
            isValid = false;
        }
    });
    
    // Validate privacy checkbox
    const privacyCheckbox = form.querySelector('input[name="privacy"]');
    if (privacyCheckbox && !privacyCheckbox.checked) {
        isValid = false;
        showFormMessage('Please accept the terms and conditions to continue.', 'error');
    }
    
    return isValid;
}

// Legal modals removed in favor of standalone pages

function validateField(field) {
    const value = field.value.trim();
    const fieldName = field.name;
    let isValid = true;
    let errorMessage = '';
    
    // Remove existing error messages
    const existingError = field.parentElement.querySelector('.form-error');
    if (existingError) {
        existingError.remove();
    }
    
    // Validation rules
    switch (fieldName) {
        case 'name':
            if (value.length < 2) {
                isValid = false;
                errorMessage = 'Name must be at least 2 characters long';
            }
            break;
        case 'email':
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                errorMessage = 'Please enter a valid email address';
            }
            break;
        case 'message':
            if (value.length < 10) {
                isValid = false;
                errorMessage = 'Message must be at least 10 characters long';
            }
            break;
    }
    
    // Show/hide error message
    if (!isValid && errorMessage) {
        const errorElement = document.createElement('div');
        errorElement.className = 'form-error';
        errorElement.textContent = errorMessage;
        field.parentElement.appendChild(errorElement);
        
        field.style.borderColor = '#ef4444';
        
        // Show error animation
        if (window.animationManager) {
            window.animationManager.showErrorAnimation(field);
        }
    } else if (isValid && value) {
        field.style.borderColor = '#10b981';
        
        // Show success animation
        if (window.animationManager) {
            window.animationManager.showSuccessAnimation(field);
        }
    }
    
    return isValid;
}

function showFormMessage(message, type) {
    const form = document.getElementById('contactForm');
    const existingMessage = form.querySelector('.form-message');
    
    if (existingMessage) {
        existingMessage.remove();
    }
    
    const messageElement = document.createElement('div');
    messageElement.className = `form-message form-${type} animate-fade-in-up`;
    messageElement.textContent = message;
    
    form.appendChild(messageElement);
    
    // Show animation based on type
    if (window.animationManager) {
        if (type === 'success') {
            window.animationManager.showSuccessAnimation(messageElement);
        } else {
            window.animationManager.showErrorAnimation(messageElement);
        }
    }
    
    // Auto-remove message after 5 seconds
    setTimeout(() => {
        if (messageElement.parentElement) {
            messageElement.classList.add('animate-fade-out');
            setTimeout(() => {
                if (messageElement.parentElement) {
                    messageElement.remove();
                }
            }, 300);
        }
    }, 5000);
}

// Add smooth scroll for contact section links
function initContactScroll() {
    const contactLinks = document.querySelectorAll('a[href="#contact"]');
    
    contactLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const contactSection = document.querySelector('.contact-section');
            if (contactSection) {
                contactSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Initialize contact section when DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initContactSection);
} else {
    initContactSection();
}
