<?php
/**
 * Template Name: Elementor Full Width
 * Template Post Type: page
 *
 * Full-width layout with header and footer but no page hero or content wrappers.
 * Perfect for pages designed entirely in Elementor.
 *
 * @package NeedsCare
 */

get_header(); ?>

<?php
if ( is_front_page() ) {
    get_template_part( 'template-parts/hero' );
} else {
    get_template_part( 'template-parts/hero-page' );
}
?>

<main class="main-content" id="main-content" role="main">
    <div class="elementor-page-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
