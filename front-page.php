<?php
/**
 * Front Page Template (Homepage)
 *
 * @package NeedsCare
 */

get_header(); ?>

<main class="main-content" id="main-content" role="main">
    <?php get_template_part( 'template-parts/hero' ); ?>
    <?php get_template_part( 'template-parts/services' ); ?>
    <?php get_template_part( 'template-parts/differentiator' ); ?>
    <?php get_template_part( 'template-parts/about' ); ?>
    <?php get_template_part( 'template-parts/ndis-support' ); ?>
    <?php get_template_part( 'template-parts/testimonials' ); ?>
    <?php get_template_part( 'template-parts/faq' ); ?>

    <!-- Google Map -->
    <section class="map-section">
        <div class="container">
            <div class="text-center" style="margin-bottom: 30px;">
                <h4 class="section-subtitle"><i class="fa-solid fa-location-dot"></i> Find Us</h4>
                <h2 class="section-title">Our Location</h2>
            </div>
        </div>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d487.1510104195783!2d130.88885958282694!3d-12.368989565957968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2cc095e69cdced71%3A0x181ddbd835d47004!2sDiamond%20Spices%20%7C%20Indian%20Grocery%20Store%20%26%20Super%20Market!5e0!3m2!1sen!2sau!4v1772672782510!5m2!1sen!2sau" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Needs Care Location"></iframe>
        </div>
    </section>
</main>

<?php get_footer(); ?>
