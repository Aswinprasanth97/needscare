<?php
/**
 * Template Name: Contact Page
 *
 * @package NeedsCare
 */

get_header(); ?>

<main class="main-content" id="main-content" role="main">

<?php if ( needscare_is_elementor_page() ) : ?>

    <div class="elementor-page-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>

<?php else : ?>

    <?php get_template_part( 'template-parts/hero-page' ); ?>


    <div class="container section">
        <div class="contact-grid">
            <div class="contact-form-wrapper">
                <h3>Send Us a Message</h3>
                <?php the_content(); ?>
            </div>

            <div class="contact-info-sidebar">
                <div class="contact-info-card">
                    <span class="icon">&#128205;</span>
                    <h4>Our Address</h4>
                    <p><?php echo esc_html( needscare_get( 'contact_address', '123 Care Avenue, Donnybrook VIC 3064' ) ); ?></p>
                </div>
                <div class="contact-info-card">
                    <span class="icon">&#9742;</span>
                    <h4>Phone</h4>
                    <p><?php echo esc_html( needscare_get( 'contact_phone', '0468 370 705' ) ); ?></p>
                </div>
                <div class="contact-info-card">
                    <span class="icon">&#9993;</span>
                    <h4>Email</h4>
                    <p><?php echo esc_html( needscare_get( 'contact_email', 'info@needscare.com.au' ) ); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Map -->
    <section class="map-section">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d487.1510104195783!2d130.88885958282694!3d-12.368989565957968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2cc095e69cdced71%3A0x181ddbd835d47004!2sDiamond%20Spices%20%7C%20Indian%20Grocery%20Store%20%26%20Super%20Market!5e0!3m2!1sen!2sau!4v1772672782510!5m2!1sen!2sau" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Needs Care Location"></iframe>
        </div>
    </section>

<?php endif; ?>

</main>

<?php get_footer(); ?>
