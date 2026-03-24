<?php
/**
 * Template Part: Simple Page Hero Section
 * Used on non-homepage pages to display the page title with a clean design.
 *
 * @package NeedsCare
 */

$page_title = get_the_title();
$breadcrumb_home = __( 'Home', 'needscare' );
?>

<section class="page-hero" id="page-hero">
    <div class="page-hero-overlay" aria-hidden="true"></div>

    <!-- Decorative shapes -->
    <div class="page-hero-shapes" aria-hidden="true">
        <div class="page-hero-shape page-hero-shape-1"></div>
        <div class="page-hero-shape page-hero-shape-2"></div>
        <div class="page-hero-shape page-hero-shape-3"></div>
    </div>

    <div class="container page-hero-content">
        <h1 class="page-hero-title"><?php echo esc_html( $page_title ); ?></h1>

        <!-- Breadcrumb -->
        <nav class="page-hero-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'needscare' ); ?>">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $breadcrumb_home ); ?></a>
            <span class="page-hero-breadcrumb-sep" aria-hidden="true">
                <i class="fa-solid fa-chevron-right"></i>
            </span>
            <span class="page-hero-breadcrumb-current"><?php echo esc_html( $page_title ); ?></span>
        </nav>
    </div>
</section>
