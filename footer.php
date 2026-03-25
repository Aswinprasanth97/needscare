<!-- Footer -->
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-col footer-brand">
                <?php $footer_logo = get_theme_mod( 'footer_logo' ); ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — <?php esc_attr_e( 'Home', 'needscare' ); ?>">
                    <?php if ( $footer_logo ) : ?>
                        <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="footer-logo-img">
                    <?php else : ?>
                        <span class="logo-icon" aria-hidden="true">&#x2624;</span>
                        <div class="logo-text">
                            <h2><?php bloginfo( 'name' ); ?></h2>
                            <p><?php bloginfo( 'description' ); ?></p>
                        </div>
                    <?php endif; ?>
                </a>
                <p>Compassionate care tailored to your needs. Empowering independence every step of the way.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick Links Column -->
            <div class="footer-col">
                <h4><?php esc_html_e( 'Quick Links', 'needscare' ); ?></h4>
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer-links',
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ) );
                    ?>
                <?php else : ?>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">&gt; Home</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">&gt; About Us</a></li>
                        <li><a href="<?php echo esc_url( needscare_gallery_permalink() ); ?>">&gt; <?php esc_html_e( 'Gallery', 'needscare' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">&gt; Services</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/referral/' ) ); ?>">&gt; Referral</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/career/' ) ); ?>">&gt; Career</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">&gt; Contact Us</a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Services Column -->
            <div class="footer-col">
                <h4><?php esc_html_e( 'Our Services', 'needscare' ); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/assist-life-stage-transition/' ) ); ?>">&gt; Assist-Life Stage</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/assist-personal-activities/' ) ); ?>">&gt; Assist-Personal Activities</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/assist-travel-transport/' ) ); ?>">&gt; Assist-Travel/Transport</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/community-nursing-care/' ) ); ?>">&gt; Community Nursing Care</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/daily-tasks-shared-living/' ) ); ?>">&gt; Daily Tasks/Shared Living</a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="footer-col">
                <h4><?php esc_html_e( 'Contact Info', 'needscare' ); ?></h4>
                <ul class="footer-contact">
                    <li>
                        <span class="icon">&#128205;</span>
                        <div>
                            <strong>Address:</strong><br>
                            <?php echo esc_html( needscare_get( 'contact_address', '123 Care Avenue, Donnybrook VIC 3064' ) ); ?>
                        </div>
                    </li>
                    <li>
                        <span class="icon">&#9742;</span>
                        <div>
                            <strong>Phone:</strong><br>
                            <?php echo esc_html( needscare_get( 'contact_phone', '0468 370 705' ) ); ?>
                        </div>
                    </li>
                    <li>
                        <span class="icon">&#9993;</span>
                        <div>
                            <strong>Email:</strong><br>
                            <?php echo esc_html( needscare_get( 'contact_email', 'info@needscare.com.au' ) ); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p class="footer-copyright">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'needscare' ); ?></p>
            <nav class="footer-legal" aria-label="<?php esc_attr_e( 'Legal', 'needscare' ); ?>">
                <a href="<?php echo esc_url( needscare_terms_permalink() ); ?>"><?php esc_html_e( 'Terms and Conditions', 'needscare' ); ?></a>
                <span class="footer-legal-sep" aria-hidden="true">&middot;</span>
                <a href="<?php echo esc_url( needscare_privacy_policy_permalink() ); ?>"><?php esc_html_e( 'Privacy Policy', 'needscare' ); ?></a>
            </nav>
        </div>
    </div>
</footer>

<?php get_template_part( 'template-parts/accessibility-toolbar' ); ?>

<a
    href="<?php echo esc_url( needscare_whatsapp_url() ); ?>"
    class="whatsapp-float"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="<?php esc_attr_e( 'Message us on WhatsApp', 'needscare' ); ?>"
>
    <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
</a>

<!-- Back to Top Button -->
<button id="back-to-top" class="back-to-top" aria-label="Back to Top">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>
