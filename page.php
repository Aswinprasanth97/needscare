<?php
/**
 * Generic Page Template — Elementor Compatible
 *
 * If the page is built with Elementor, it renders a clean full-width
 * layout without the theme's page hero/content wrappers.
 * Otherwise it uses the standard NeedsCare page design.
 *
 * @package NeedsCare
 */

get_header();

// Check if Elementor built this page
$is_elementor = needscare_is_elementor_page();
?>

<main class="main-content" id="main-content" role="main">

<?php if ( $is_elementor ) : ?>

    <?php /* ── Elementor Full-Width Layout ── */ ?>
    <div class="elementor-page-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>

<?php else : ?>

    <?php /* ── Standard NeedsCare Layout ── */ ?>

    <!-- Page Hero Header -->
    <section class="page-hero">
        <div class="page-hero-overlay" aria-hidden="true"></div>
        <div class="ph-streak ph-streak-1" aria-hidden="true"></div>
        <div class="ph-streak ph-streak-2" aria-hidden="true"></div>
        <div class="container page-hero-inner">
            <nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'needscare' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house"></i> <?php esc_html_e( 'Home', 'needscare' ); ?></a>
                <span class="breadcrumb-sep" aria-hidden="true">/</span>
                <span class="breadcrumb-current"><?php the_title(); ?></span>
            </nav>
            <h1 class="page-hero-title"><?php the_title(); ?></h1>
            <div class="page-hero-bar" aria-hidden="true"></div>
        </div>
        <div class="page-hero-wave" aria-hidden="true">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0,60 C360,0 720,80 1440,30 L1440,80 L0,80 Z" fill="var(--off-white)"/>
            </svg>
        </div>
    </section>

    <!-- Page Body -->
    <section class="page-body">
        <div class="container">
            <div class="page-layout">
                <article class="page-article">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="page-featured-img">
                                <?php the_post_thumbnail( 'large', array( 'class' => 'page-thumb' ) ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="page-content">
                            <?php the_content(); ?>
                        </div>

                    <?php endwhile; ?>
                </article>
            </div>
        </div>
    </section>

<?php endif; ?>

</main>

<?php get_footer(); ?>
