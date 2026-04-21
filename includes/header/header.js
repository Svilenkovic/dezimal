document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.header');
    const toggleButton = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileBackdrop = mobileMenu ? mobileMenu.querySelector('.mobile-backdrop') : null;

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    if (toggleButton && mobileMenu) {
        let justOpenedAt = 0;
        const openMenu = () => {
            mobileMenu.classList.remove('hidden');
            // allow layout to apply before adding open for smoother animation
            requestAnimationFrame(() => {
                mobileMenu.classList.add('open');
            });
            toggleButton.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
            justOpenedAt = Date.now();
        };
        const closeMenu = () => {
            mobileMenu.classList.remove('open');
            toggleButton.setAttribute('aria-expanded', 'false');
            // wait for transition, then hide
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = '';
            }, 250);
        };

        toggleButton.addEventListener('click', function(e) {
            e.stopPropagation();
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                openMenu();
            } else {
                closeMenu();
            }
        });

        // Close on backdrop click
        if (mobileBackdrop) {
            mobileBackdrop.addEventListener('click', function() {
                // Ignore clicks occurring immediately after opening (prevents immediate close)
                if (Date.now() - justOpenedAt < 200) return;
                closeMenu();
            });
        }

        // Close menu when clicking a link inside panel
        mobileMenu.addEventListener('click', function(event) {
            const target = event.target;
            if (target.tagName === 'A') {
                closeMenu();
            }
        });

        // Close on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                closeMenu();
            }
        });
    }
});
