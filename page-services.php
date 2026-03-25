<?php
/**
 * Template Name: Services Page
 *
 * @package NeedsCare
 */

get_header();

$services = needscare_get_service_definitions();
?>

<main class="main-content" id="main-content" role="main">

<?php if ( needscare_is_elementor_page() ) : ?>

    <div class="elementor-page-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>

<?php else : ?>

    <?php get_template_part( 'template-parts/hero-page' ); ?>


    <section class="section">
        <div class="container">
            <div class="text-center" style="margin-bottom: 40px;">
                <h4 class="section-subtitle">WHAT WE OFFER</h4>
                <h2 class="section-title">COMPREHENSIVE CARE SERVICES</h2>
                <p>At NeedsCare, we take pride in offering a comprehensive range of support services tailored to meet diverse needs.</p>
            </div>

            <div class="services-grid">
                <?php foreach ( $services as $slug => $service ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>" class="svc-card svc-card-link">
                        <div class="svc-icon-wrap">
                            <i class="fa-solid <?php echo esc_attr( needscare_get_service_icon_fa( $slug ) ); ?>"></i>
                        </div>
                        <h3 class="svc-title"><?php echo esc_html( $service['title'] ); ?></h3>
                        <p class="svc-desc"><?php echo esc_html( $service['desc'] ); ?></p>
                        <span class="svc-arrow" aria-hidden="true">
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/ndis-support' ); ?>

    <!-- Page Content from WordPress Editor -->
    <section class="section">
        <div class="container">
            <div class="page-content">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="differentiator section">
        <div class="container text-center text-white diff-content">
            <h2 class="diff-title">Need Our Services?</h2>
            <p class="diff-desc">Get in touch with our team to discuss how we can support you or your loved ones.</p>
            <div class="hero-buttons" style="justify-content: center;">
                <a href="<?php echo esc_url( home_url( '/referral/' ) ); ?>" class="btn btn-primary">MAKE A REFERRAL</a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline diff-btn">CONTACT US</a>
            </div>
        </div>
    </section>

<?php endif; ?>

</main>

<?php get_footer(); ?>
