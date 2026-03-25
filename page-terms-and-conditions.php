<?php
/**
 * Template Name: Terms and Conditions
 *
 * Create a page with slug "terms-and-conditions" (recommended) and assign this template.
 * Add your legal copy in the block editor.
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

    <section class="section legal-page-section">
        <div class="container">
            <article class="legal-page">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <div class="legal-page-content entry-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            </article>
        </div>
    </section>

<?php endif; ?>

</main>

<?php
get_footer();
