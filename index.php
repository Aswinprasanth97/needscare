<?php
/**
 * The main template file (blog index / fallback).
 *
 * @package NeedsCare
 */

get_header(); 
$is_elementor = needscare_is_elementor_page();
?>

<main class="main-content" id="main-content" role="main">
    <?php if ( ! $is_elementor ) : ?>
        <?php get_template_part( 'template-parts/hero-page' ); ?>
    <?php endif; ?>

    <div class="container section">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-excerpt"><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>

            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e( 'No posts found.', 'needscare' ); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
