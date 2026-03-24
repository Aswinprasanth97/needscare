/**
 * NeedsCare Theme — Accessibility Toolbar
 *
 * NDIS / WCAG 2.2 AA Compliance
 * @package NeedsCare
 */

document.addEventListener('DOMContentLoaded', () => {
    /* =================================================================
       DOM REFERENCES
       ================================================================= */
    const trigger = document.getElementById('a11y-trigger');
    const panel = document.getElementById('a11y-panel');
    const overlay = document.getElementById('a11y-overlay');
    const closeBtn = document.getElementById('a11y-close');

    const fontDecBtn = document.getElementById('a11y-font-decrease');
    const fontIncBtn = document.getElementById('a11y-font-increase');
    const fontValue = document.getElementById('a11y-font-value');

    const contrastToggle = document.getElementById('a11y-contrast');
    const dyslexiaToggle = document.getElementById('a11y-dyslexia');
    const linksToggle = document.getElementById('a11y-links');
    const motionToggle = document.getElementById('a11y-motion');

    const resetBtn = document.getElementById('a11y-reset');

    if (!trigger || !panel) return;

    /* =================================================================
       STATE
       ================================================================= */
    const STORAGE_KEY = 'needscare_a11y_prefs';

    const defaults = {
        fontSize: 100,
        highContrast: false,
        dyslexiaFont: false,
        highlightLinks: false,
        reducedMotion: false
    };

    let prefs = { ...defaults };

    /* =================================================================
       PERSISTENCE — LocalStorage
       ================================================================= */
    function savePrefs() {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(prefs));
        } catch (e) { /* storage full or blocked — fail silently */ }
    }

    function loadPrefs() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            if (raw) {
                const parsed = JSON.parse(raw);
                prefs = { ...defaults, ...parsed };
            }
        } catch (e) { /* corrupted — use defaults */ }
    }

    /* =================================================================
       APPLY PREFERENCES TO DOM
       ================================================================= */
    function applyFontSize() {
        document.documentElement.style.fontSize = prefs.fontSize + '%';
        if (fontValue) fontValue.textContent = prefs.fontSize + '%';
    }

    function applyHighContrast() {
        document.body.classList.toggle('a11y-high-contrast', prefs.highContrast);
        if (contrastToggle) contrastToggle.checked = prefs.highContrast;
    }

    function applyDyslexiaFont() {
        document.body.classList.toggle('a11y-dyslexia-font', prefs.dyslexiaFont);
        if (dyslexiaToggle) dyslexiaToggle.checked = prefs.dyslexiaFont;
    }

    function applyHighlightLinks() {
        document.body.classList.toggle('a11y-highlight-links', prefs.highlightLinks);
        if (linksToggle) linksToggle.checked = prefs.highlightLinks;
    }

    function applyReducedMotion() {
        document.body.classList.toggle('a11y-reduced-motion', prefs.reducedMotion);
        if (motionToggle) motionToggle.checked = prefs.reducedMotion;
    }

    function applyAll() {
        applyFontSize();
        applyHighContrast();
        applyDyslexiaFont();
        applyHighlightLinks();
        applyReducedMotion();
    }

    /* =================================================================
       TOOLBAR OPEN / CLOSE
       ================================================================= */
    let lastFocusedElement = null;

    function openPanel() {
        lastFocusedElement = document.activeElement;
        panel.classList.add('open');
        overlay.classList.add('open');
        trigger.setAttribute('aria-expanded', 'true');
        panel.setAttribute('aria-hidden', 'false');

        // Focus first interactive element
        setTimeout(() => {
            if (closeBtn) closeBtn.focus();
        }, 350);
    }

    function closePanel() {
        panel.classList.remove('open');
        overlay.classList.remove('open');
        trigger.setAttribute('aria-expanded', 'false');
        panel.setAttribute('aria-hidden', 'true');

        // Return focus
        if (lastFocusedElement) {
            lastFocusedElement.focus();
        }
    }

    trigger.addEventListener('click', openPanel);
    if (closeBtn) closeBtn.addEventListener('click', closePanel);
    if (overlay) overlay.addEventListener('click', closePanel);

    /* =================================================================
       KEYBOARD SUPPORT
       ================================================================= */
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && panel.classList.contains('open')) {
            closePanel();
        }
    });

    // Focus trap within panel
    panel.addEventListener('keydown', (e) => {
        if (e.key !== 'Tab') return;

        const focusable = panel.querySelectorAll(
            'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        if (focusable.length === 0) return;

        const first = focusable[0];
        const last = focusable[focusable.length - 1];

        if (e.shiftKey) {
            if (document.activeElement === first) {
                e.preventDefault();
                last.focus();
            }
        } else {
            if (document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }
    });

    /* =================================================================
       FONT SIZE CONTROLS
       ================================================================= */
    const FONT_MIN = 80;
    const FONT_MAX = 150;
    const FONT_STEP = 10;

    if (fontDecBtn) {
        fontDecBtn.addEventListener('click', () => {
            prefs.fontSize = Math.max(FONT_MIN, prefs.fontSize - FONT_STEP);
            applyFontSize();
            savePrefs();
        });
    }

    if (fontIncBtn) {
        fontIncBtn.addEventListener('click', () => {
            prefs.fontSize = Math.min(FONT_MAX, prefs.fontSize + FONT_STEP);
            applyFontSize();
            savePrefs();
        });
    }

    /* =================================================================
       TOGGLE CONTROLS
       ================================================================= */
    if (contrastToggle) {
        contrastToggle.addEventListener('change', () => {
            prefs.highContrast = contrastToggle.checked;
            applyHighContrast();
            savePrefs();
        });
    }

    if (dyslexiaToggle) {
        dyslexiaToggle.addEventListener('change', () => {
            prefs.dyslexiaFont = dyslexiaToggle.checked;
            applyDyslexiaFont();
            savePrefs();
        });
    }

    if (linksToggle) {
        linksToggle.addEventListener('change', () => {
            prefs.highlightLinks = linksToggle.checked;
            applyHighlightLinks();
            savePrefs();
        });
    }

    if (motionToggle) {
        motionToggle.addEventListener('change', () => {
            prefs.reducedMotion = motionToggle.checked;
            applyReducedMotion();
            savePrefs();
        });
    }

    /* =================================================================
       RESET ALL
       ================================================================= */
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            prefs = { ...defaults };
            applyAll();
            savePrefs();

            // Brief visual feedback
            resetBtn.textContent = '✓ Reset Complete';
            setTimeout(() => {
                resetBtn.innerHTML = '<span>↺</span> Reset All Settings';
            }, 1200);
        });
    }

    /* =================================================================
       INITIALISE — Restore preferences on load
       ================================================================= */
    loadPrefs();

    // Respect OS prefers-reduced-motion on first visit
    if (!localStorage.getItem(STORAGE_KEY)) {
        const motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
        if (motionQuery.matches) {
            prefs.reducedMotion = true;
        }
    }

    applyAll();
});
