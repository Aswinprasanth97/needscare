/**
 * NeedsCare Theme - Main JavaScript
 *
 * Handles: Sticky header, mobile menu, dropdowns, hero carousel, scroll animations.
 *
 * @package NeedsCare
 */

document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('site-header');
    const menuToggle = document.getElementById('menu-toggle');
    const nav = document.getElementById('main-nav');
    const navBackdrop = document.getElementById('nav-backdrop');
    const MOBILE_NAV_BREAKPOINT = 991;

    /* =========================================================
       Sticky Header on Scroll
       ========================================================= */
    function updateNavBackdropTop() {
        if (!header) return;
        document.documentElement.style.setProperty(
            '--nav-backdrop-top',
            `${header.getBoundingClientRect().bottom}px`
        );
    }

    /**
     * Match hero top padding to the real fixed header bottom (admin bar, mobile padding, zoom).
     * Do not run on scroll — header height can shrink when scrolled and would clip the hero.
     */
    function updateHeroClearTop() {
        if (!header) return;
        const bufferPx = 20;
        const px = `${Math.ceil(header.getBoundingClientRect().bottom + bufferPx)}px`;
        document.documentElement.style.setProperty('--hero-clear-top', px);
    }

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        updateNavBackdropTop();
    });
    window.addEventListener('resize', () => {
        updateNavBackdropTop();
        updateHeroClearTop();
    });
    updateNavBackdropTop();
    updateHeroClearTop();
    window.addEventListener('load', updateHeroClearTop);
    requestAnimationFrame(() => {
        updateHeroClearTop();
        requestAnimationFrame(updateHeroClearTop);
    });

    /* =========================================================
       Mobile Menu Toggle, Backdrop, A11y
       ========================================================= */
    const dropdowns = document.querySelectorAll('.dropdown');

    function setMobileNavOpen(open) {
        if (!menuToggle || !nav) return;
        const isMobile = window.innerWidth <= MOBILE_NAV_BREAKPOINT;

        if (!isMobile) {
            menuToggle.classList.remove('active');
            nav.classList.remove('active');
            menuToggle.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('nav-open');
            document.documentElement.classList.remove('nav-open');
            if (navBackdrop) {
                navBackdrop.hidden = true;
                navBackdrop.setAttribute('aria-hidden', 'true');
            }
            nav.removeAttribute('aria-hidden');
            return;
        }

        menuToggle.classList.toggle('active', open);
        nav.classList.toggle('active', open);
        menuToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        menuToggle.setAttribute(
            'aria-label',
            open
                ? (menuToggle.dataset.labelClose || 'Close menu')
                : (menuToggle.dataset.labelOpen || 'Open menu')
        );
        document.body.classList.toggle('nav-open', open);
        document.documentElement.classList.toggle('nav-open', open);
        nav.setAttribute('aria-hidden', open ? 'false' : 'true');

        if (navBackdrop) {
            navBackdrop.hidden = !open;
            navBackdrop.setAttribute('aria-hidden', open ? 'false' : 'true');
        }

        if (!open) {
            dropdowns.forEach((d) => d.classList.remove('open'));
        }

        updateNavBackdropTop();
    }

    if (menuToggle && nav) {
        menuToggle.addEventListener('click', () => {
            setMobileNavOpen(!nav.classList.contains('active'));
        });
    }

    if (navBackdrop) {
        navBackdrop.addEventListener('click', () => setMobileNavOpen(false));
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && nav && nav.classList.contains('active')) {
            setMobileNavOpen(false);
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > MOBILE_NAV_BREAKPOINT) {
            setMobileNavOpen(false);
        } else if (nav && !nav.classList.contains('active')) {
            nav.setAttribute('aria-hidden', 'true');
        }
    });

    if (nav && window.innerWidth <= MOBILE_NAV_BREAKPOINT && !nav.classList.contains('active')) {
        nav.setAttribute('aria-hidden', 'true');
    }

    if (nav) {
        nav.addEventListener('click', (e) => {
            const a = e.target.closest('a');
            if (!a || !nav.classList.contains('active') || window.innerWidth > MOBILE_NAV_BREAKPOINT) return;
            const href = a.getAttribute('href');
            if (a.classList.contains('nav-mobile-referral') && href && href !== '#') {
                setMobileNavOpen(false);
                return;
            }
            const parentLi = a.closest('li');
            if (!parentLi) return;
            if (parentLi.classList.contains('dropdown') && a.classList.contains('nav-link')) {
                return;
            }
            if (href && href !== '#') {
                setMobileNavOpen(false);
            }
        });
    }

    /* =========================================================
       Mobile Dropdown Handling
       ========================================================= */
    dropdowns.forEach(dropdown => {
        const link = dropdown.querySelector('.nav-link');
        if (link) {
            link.addEventListener('click', (e) => {
                if (window.innerWidth <= MOBILE_NAV_BREAKPOINT) {
                    e.preventDefault();
                    dropdown.classList.toggle('open');
                }
            });
        }
    });

    /* =========================================================
       Hero Carousel
       ========================================================= */
    const carousel = document.getElementById('hero-carousel');
    if (carousel) {
        const slides = carousel.querySelectorAll('.hero-slide');
        const prevBtn = document.getElementById('hero-prev');
        const nextBtn = document.getElementById('hero-next');
        const indicators = carousel.querySelectorAll('.hero-indicator');
        let currentSlide = 0;
        let autoPlayInterval = null;
        const INTERVAL_MS = 6000;

        function goToSlide(index) {
            slides[currentSlide].classList.remove('active');
            indicators.forEach(ind => ind.classList.remove('active'));

            if (index >= slides.length) index = 0;
            if (index < 0) index = slides.length - 1;

            currentSlide = index;
            slides[currentSlide].classList.add('active');

            // Update indicator
            if (indicators[currentSlide]) {
                indicators[currentSlide].classList.add('active');
                indicators[currentSlide].setAttribute('aria-selected', 'true');
            }
            // Reset aria on others
            indicators.forEach((ind, i) => {
                if (i !== currentSlide) ind.setAttribute('aria-selected', 'false');
            });
        }

        function nextSlide() { goToSlide(currentSlide + 1); }
        function prevSlide() { goToSlide(currentSlide - 1); }

        // Arrow listeners
        if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetAutoPlay(); });
        if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetAutoPlay(); });

        // Indicator clicks
        indicators.forEach(ind => {
            ind.addEventListener('click', () => {
                const idx = parseInt(ind.dataset.slide, 10);
                goToSlide(idx);
                resetAutoPlay();
            });
        });

        // Auto-play
        function startAutoPlay() { autoPlayInterval = setInterval(nextSlide, INTERVAL_MS); }
        function resetAutoPlay() { clearInterval(autoPlayInterval); startAutoPlay(); }

        // Pause on hover
        carousel.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
        carousel.addEventListener('mouseleave', () => startAutoPlay());

        // Keyboard
        document.addEventListener('keydown', (e) => {
            const rect = carousel.getBoundingClientRect();
            if (rect.bottom < 0 || rect.top > window.innerHeight) return;
            if (e.key === 'ArrowLeft') { prevSlide(); resetAutoPlay(); }
            if (e.key === 'ArrowRight') { nextSlide(); resetAutoPlay(); }
        });

        // Touch / Swipe
        let touchStartX = 0;
        carousel.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        carousel.addEventListener('touchend', (e) => {
            const diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 50) {
                diff > 0 ? nextSlide() : prevSlide();
                resetAutoPlay();
            }
        }, { passive: true });

        startAutoPlay();
    }

    /* =========================================================
       FAQ Accordion
       ========================================================= */
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const btn = item.querySelector('.faq-question');
        if (btn) {
            btn.addEventListener('click', () => {
                const isActive = item.classList.contains('active');

                // Close all other items
                faqItems.forEach(other => other.classList.remove('active'));

                // Toggle current
                if (!isActive) {
                    item.classList.add('active');
                    btn.setAttribute('aria-expanded', 'true');
                } else {
                    btn.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });

    /* =========================================================
       Scroll Reveal Animations
       ========================================================= */
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements for scroll animation
    const animateElements = document.querySelectorAll('.svc-card, .pillar, .about-text, .about-images, .contact-info-card, .faq-item, .testimonials-header, .reveal-on-scroll');
    animateElements.forEach(el => {
        el.classList.add('reveal-on-scroll');
        observer.observe(el);
    });

    /* =========================================================
       Testimonials Carousel
       ========================================================= */
    const tCarousel = document.getElementById('testimonials-carousel');
    if (tCarousel) {
        const tCards = tCarousel.querySelectorAll('.tcard');
        const tTrack = document.getElementById('testimonials-track');
        const tPrev = document.getElementById('tcarousel-prev');
        const tNext = document.getElementById('tcarousel-next');
        const tDotsBox = document.getElementById('tcarousel-dots');
        const tDots = tDotsBox ? tDotsBox.querySelectorAll('.tcarousel-dot') : [];
        let tCurrent = 0;
        let tAutoPlay = null;
        const T_INTERVAL = 8000;

        function tGoTo(index, direction) {
            if (index === tCurrent) return;

            const prev = tCurrent;
            const next = (index + tCards.length) % tCards.length;

            // Determine exit direction
            const exitClass = direction === 'prev' ? '' : 'exit-left';

            // Remove active from current
            tCards[prev].classList.remove('active');
            if (exitClass) tCards[prev].classList.add(exitClass);

            // After transition, clean up exit class
            setTimeout(() => {
                tCards[prev].classList.remove('exit-left');
            }, 600);

            // Set incoming slide direction
            if (direction === 'prev') {
                tCards[next].style.transform = 'translateX(-60px) scale(0.95)';
            } else {
                tCards[next].style.transform = 'translateX(60px) scale(0.95)';
            }

            // Force reflow then animate in
            void tCards[next].offsetWidth;
            tCards[next].style.transform = '';
            tCards[next].classList.add('active');

            // Update dots
            tDots.forEach((d, i) => {
                d.classList.toggle('active', i === next);
                d.setAttribute('aria-selected', i === next ? 'true' : 'false');
            });

            tCurrent = next;

            // Auto-size track height
            requestAnimationFrame(() => {
                const innerEl = tCards[next].querySelector('.tcard-inner');
                if (innerEl && tTrack) {
                    tTrack.style.minHeight = innerEl.offsetHeight + 'px';
                }
            });
        }

        function tNextSlide() { tGoTo((tCurrent + 1) % tCards.length, 'next'); }
        function tPrevSlide() { tGoTo((tCurrent - 1 + tCards.length) % tCards.length, 'prev'); }

        function tStartAuto() { tAutoPlay = setInterval(tNextSlide, T_INTERVAL); }
        function tResetAuto() { clearInterval(tAutoPlay); tStartAuto(); }

        // Arrow clicks
        if (tPrev) tPrev.addEventListener('click', () => { tPrevSlide(); tResetAuto(); });
        if (tNext) tNext.addEventListener('click', () => { tNextSlide(); tResetAuto(); });

        // Dot clicks
        tDots.forEach(dot => {
            dot.addEventListener('click', () => {
                const idx = parseInt(dot.dataset.index, 10);
                const dir = idx > tCurrent ? 'next' : 'prev';
                tGoTo(idx, dir);
                tResetAuto();
            });
        });

        // Pause on hover
        tCarousel.addEventListener('mouseenter', () => clearInterval(tAutoPlay));
        tCarousel.addEventListener('mouseleave', () => tStartAuto());

        // Keyboard navigation (when carousel is visible)
        document.addEventListener('keydown', (e) => {
            const rect = tCarousel.getBoundingClientRect();
            if (rect.bottom < 0 || rect.top > window.innerHeight) return;
            if (e.key === 'ArrowLeft') { tPrevSlide(); tResetAuto(); }
            if (e.key === 'ArrowRight') { tNextSlide(); tResetAuto(); }
        });

        // Touch / swipe
        let tTouchStart = 0;
        tCarousel.addEventListener('touchstart', (e) => {
            tTouchStart = e.changedTouches[0].screenX;
        }, { passive: true });

        tCarousel.addEventListener('touchend', (e) => {
            const diff = tTouchStart - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 50) {
                diff > 0 ? tNextSlide() : tPrevSlide();
                tResetAuto();
            }
        }, { passive: true });

        // Initial height sizing
        requestAnimationFrame(() => {
            const firstInner = tCards[0] && tCards[0].querySelector('.tcard-inner');
            if (firstInner && tTrack) {
                tTrack.style.minHeight = firstInner.offsetHeight + 'px';
            }
        });

        tStartAuto();
    }

    /* =========================================================
       Back to Top Button
       ========================================================= */
    const backToTop = document.getElementById('back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /* =========================================================
       About Us — Counter Animation
       ========================================================= */
    const counterEls = document.querySelectorAll('.abt-stat-number[data-count]');
    if (counterEls.length) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.count, 10);
                    const duration = 1800;
                    const startTime = performance.now();

                    const animate = (now) => {
                        const elapsed = now - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        // easeOutQuart for smooth deceleration
                        const eased = 1 - Math.pow(1 - progress, 4);
                        el.textContent = Math.floor(eased * target);
                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        } else {
                            el.textContent = target;
                        }
                    };
                    requestAnimationFrame(animate);
                    counterObserver.unobserve(el);
                }
            });
        }, { threshold: 0.5 });

        counterEls.forEach(el => counterObserver.observe(el));
    }
});
