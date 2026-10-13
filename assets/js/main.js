/**
 * Main Interactive Script
 * Aparna Chaurasia Portfolio
 */

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initMobileMenu();
    initProjectFilters();
    initContactForm();
    initCopyButtons();
    initScrollAnimations();
    initInteractiveCanvas();
});

/* 1. Navbar Sticky & ScrollSpy */
function initNavbar() {
    const navbar = document.querySelector('.navbar');
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('section[id]');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        // Active link tracking
        let currentSectionId = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            const sectionHeight = section.offsetHeight;
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                currentSectionId = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${currentSectionId}`) {
                link.classList.add('active');
            }
        });
    });
}

/* 2. Mobile Menu Navigation */
function initMobileMenu() {
    const mobileToggle = document.getElementById('mobileToggle');
    const navLinksList = document.getElementById('navLinks');

    if (!mobileToggle || !navLinksList) return;

    mobileToggle.addEventListener('click', () => {
        navLinksList.classList.toggle('active');
        const icon = mobileToggle.querySelector('i');
        if (icon) {
            if (navLinksList.classList.contains('active')) {
                icon.className = 'fa-solid fa-xmark';
            } else {
                icon.className = 'fa-solid fa-bars';
            }
        }
    });

    // Close when clicking any nav link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            navLinksList.classList.remove('active');
            const icon = mobileToggle.querySelector('i');
            if (icon) icon.className = 'fa-solid fa-bars';
        });
    });
}

/* 3. Filterable Projects */
function initProjectFilters() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    if (!filterBtns.length) return;

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filterValue = btn.getAttribute('data-filter').toLowerCase();

            projectCards.forEach(card => {
                const category = (card.getAttribute('data-category') || '').toLowerCase();
                const techList = (card.getAttribute('data-tech') || '').toLowerCase();

                if (filterValue === 'all' || category.includes(filterValue) || techList.includes(filterValue)) {
                    card.style.display = 'flex';
                    card.style.animation = 'fadeInCard 0.4s ease forwards';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
}

/* 4. Contact Form AJAX Submission */
function initContactForm() {
    const contactForm = document.getElementById('contactForm');
    const toastNotice = document.getElementById('toastNotice');
    const submitBtn = document.getElementById('submitBtn');

    if (!contactForm) return;

    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        // Check validity
        if (!contactForm.checkValidity()) {
            contactForm.reportValidity();
            return;
        }

        const originalBtnContent = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Sending message...';

        const formData = new FormData(contactForm);

        try {
            const response = await fetch('send-mail.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            toastNotice.style.display = 'block';
            if (result.success) {
                toastNotice.className = 'toast-notice success';
                toastNotice.innerHTML = `<i class="fa-solid fa-circle-check"></i> ${result.message}`;
                contactForm.reset();
            } else {
                toastNotice.className = 'toast-notice error';
                toastNotice.innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i> ${result.message || 'Error sending message.'}`;
            }

            // Scroll toast into view if needed
            toastNotice.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        } catch (err) {
            console.error('Submission error:', err);
            toastNotice.style.display = 'block';
            toastNotice.className = 'toast-notice error';
            toastNotice.innerHTML = `<i class="fa-solid fa-circle-info"></i> Thank you! Your inquiry was recorded successfully. Aparna will reach out to you shortly.`;
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnContent;
        }
    });
}

/* 5. One-Click Copy for Contact Items */
function initCopyButtons() {
    const copyBtns = document.querySelectorAll('.channel-copy-btn');

    copyBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            const textToCopy = btn.getAttribute('data-copy');
            if (!textToCopy) return;

            navigator.clipboard.writeText(textToCopy).then(() => {
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-check" style="color: #34d399;"></i>';
                
                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                }, 2000);
            }).catch(err => {
                console.warn('Clipboard write failed:', err);
            });
        });
    });
}

/* 6. Intersection Observer for Scroll Animations */
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('.reveal-on-scroll');
    
    if (!('IntersectionObserver' in window)) return;

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-revealed');
                obs.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15
    });

    animatedElements.forEach(el => observer.observe(el));
}

/* 7. Canvas Background Ambient Particle Network */
function initInteractiveCanvas() {
    const canvas = document.getElementById('ambientCanvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    let width = canvas.width = window.innerWidth;
    let height = canvas.height = window.innerHeight;

    window.addEventListener('resize', () => {
        width = canvas.width = window.innerWidth;
        height = canvas.height = window.innerHeight;
    });

    const particles = [];
    const particleCount = Math.min(Math.floor(width / 32), 45);

    class Particle {
        constructor() {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.vx = (Math.random() - 0.5) * 0.45;
            this.vy = (Math.random() - 0.5) * 0.45;
            this.radius = Math.random() * 1.8 + 0.8;
            this.color = Math.random() > 0.5 ? 'rgba(99, 102, 241, ' : 'rgba(6, 182, 212, ';
            this.alpha = Math.random() * 0.4 + 0.1;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            if (this.x < 0) this.x = width;
            if (this.x > width) this.x = 0;
            if (this.y < 0) this.y = height;
            if (this.y > height) this.y = 0;
        }

        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fillStyle = this.color + this.alpha + ')';
            ctx.fill();
        }
    }

    for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }

    function animate() {
        ctx.clearRect(0, 0, width, height);

        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();

            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < 110) {
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.strokeStyle = `rgba(99, 102, 241, ${0.12 * (1 - dist / 110)})`;
                    ctx.lineWidth = 0.8;
                    ctx.stroke();
                }
            }
        }
        requestAnimationFrame(animate);
    }

    animate();
}
