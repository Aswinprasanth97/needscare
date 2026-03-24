<?php
/**
 * Accessibility Toolbar — Template Part
 *
 * NDIS / WCAG 2.2 AA Compliance Widget
 * @package NeedsCare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!-- Accessibility Toolbar Trigger -->
<button
    class="a11y-trigger"
    id="a11y-trigger"
    aria-label="<?php esc_attr_e( 'Open accessibility settings', 'needscare' ); ?>"
    aria-expanded="false"
    aria-controls="a11y-panel"
    title="<?php esc_attr_e( 'Accessibility Options', 'needscare' ); ?>"
>
    <span class="a11y-trigger-icon" aria-hidden="true">♿</span>
</button>

<!-- Panel Overlay -->
<div class="a11y-panel-overlay" id="a11y-overlay" aria-hidden="true"></div>

<!-- Accessibility Settings Panel -->
<aside
    class="a11y-panel"
    id="a11y-panel"
    role="dialog"
    aria-label="<?php esc_attr_e( 'Accessibility Settings', 'needscare' ); ?>"
    aria-hidden="true"
>
    <!-- Header -->
    <div class="a11y-panel-header">
        <div class="a11y-panel-title">
            <div class="a11y-panel-title-icon" aria-hidden="true">♿</div>
            <h3>
                <?php esc_html_e( 'Accessibility', 'needscare' ); ?>
                <small><?php esc_html_e( 'NDIS Compliant', 'needscare' ); ?></small>
            </h3>
        </div>
        <button
            class="a11y-close"
            id="a11y-close"
            aria-label="<?php esc_attr_e( 'Close accessibility settings', 'needscare' ); ?>"
        >✕</button>
    </div>

    <!-- Body -->
    <div class="a11y-panel-body">

        <!-- 1. Font Size -->
        <div class="a11y-control-group">
            <div class="a11y-control-label">
                <div class="a11y-control-icon" aria-hidden="true">🔤</div>
                <span><?php esc_html_e( 'Text Size', 'needscare' ); ?></span>
            </div>
            <div class="a11y-font-controls">
                <button
                    class="a11y-font-btn"
                    id="a11y-font-decrease"
                    aria-label="<?php esc_attr_e( 'Decrease text size', 'needscare' ); ?>"
                >A−</button>
                <div class="a11y-font-value" id="a11y-font-value" aria-live="polite">100%</div>
                <button
                    class="a11y-font-btn"
                    id="a11y-font-increase"
                    aria-label="<?php esc_attr_e( 'Increase text size', 'needscare' ); ?>"
                >A+</button>
            </div>
        </div>

        <!-- 2. High Contrast -->
        <div class="a11y-control-group">
            <div class="a11y-toggle-row">
                <div class="a11y-control-label">
                    <div class="a11y-control-icon" aria-hidden="true">🌓</div>
                    <span><?php esc_html_e( 'High Contrast', 'needscare' ); ?></span>
                </div>
                <label class="a11y-toggle">
                    <input
                        type="checkbox"
                        id="a11y-contrast"
                        role="switch"
                        aria-label="<?php esc_attr_e( 'Toggle high contrast mode', 'needscare' ); ?>"
                    >
                    <span class="a11y-toggle-slider"></span>
                </label>
            </div>
        </div>

        <!-- 3. Dyslexia-Friendly Font -->
        <div class="a11y-control-group">
            <div class="a11y-toggle-row">
                <div class="a11y-control-label">
                    <div class="a11y-control-icon" aria-hidden="true">📖</div>
                    <span><?php esc_html_e( 'Dyslexia Font', 'needscare' ); ?></span>
                </div>
                <label class="a11y-toggle">
                    <input
                        type="checkbox"
                        id="a11y-dyslexia"
                        role="switch"
                        aria-label="<?php esc_attr_e( 'Toggle dyslexia-friendly font', 'needscare' ); ?>"
                    >
                    <span class="a11y-toggle-slider"></span>
                </label>
            </div>
        </div>

        <!-- 4. Highlight Links -->
        <div class="a11y-control-group">
            <div class="a11y-toggle-row">
                <div class="a11y-control-label">
                    <div class="a11y-control-icon" aria-hidden="true">🔗</div>
                    <span><?php esc_html_e( 'Highlight Links', 'needscare' ); ?></span>
                </div>
                <label class="a11y-toggle">
                    <input
                        type="checkbox"
                        id="a11y-links"
                        role="switch"
                        aria-label="<?php esc_attr_e( 'Toggle link highlighting', 'needscare' ); ?>"
                    >
                    <span class="a11y-toggle-slider"></span>
                </label>
            </div>
        </div>

        <!-- 5. Reduced Motion -->
        <div class="a11y-control-group">
            <div class="a11y-toggle-row">
                <div class="a11y-control-label">
                    <div class="a11y-control-icon" aria-hidden="true">⏸️</div>
                    <span><?php esc_html_e( 'Reduce Motion', 'needscare' ); ?></span>
                </div>
                <label class="a11y-toggle">
                    <input
                        type="checkbox"
                        id="a11y-motion"
                        role="switch"
                        aria-label="<?php esc_attr_e( 'Toggle reduced motion', 'needscare' ); ?>"
                    >
                    <span class="a11y-toggle-slider"></span>
                </label>
            </div>
        </div>

        <!-- Reset All -->
        <button
            class="a11y-reset-btn"
            id="a11y-reset"
            aria-label="<?php esc_attr_e( 'Reset all accessibility settings to defaults', 'needscare' ); ?>"
        >
            <span aria-hidden="true">↺</span>
            <?php esc_html_e( 'Reset All Settings', 'needscare' ); ?>
        </button>

        <!-- NDIS Badge -->
        <div class="a11y-badge" aria-hidden="true">
            <p>
                <strong>WCAG 2.2 AA</strong> · <?php esc_html_e( 'NDIS Compliant', 'needscare' ); ?><br>
                <?php esc_html_e( 'Disability Discrimination Act 1992', 'needscare' ); ?>
            </p>
        </div>

    </div><!-- .a11y-panel-body -->
</aside>
