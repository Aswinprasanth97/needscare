<?php
/**
 * Template Name: Referral Page
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
        <div class="form-container">
            <h3>Client Referral Form</h3>
            <p>Use the form below to submit a referral. You can attach supporting documents (NDIS plans, medical reports, etc.).</p>
            <?php the_content(); ?>
        </div>
    </div>

<?php endif; ?>

</main>

<?php get_footer(); ?>
