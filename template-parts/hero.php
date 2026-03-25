<?php
/**
 * Template Part: Hero Carousel Section — Premium Design
 *
 * @package NeedsCare
 */

$hero_title    = needscare_get( 'hero_title', 'Empowering Lives With Compassionate Care' );

// Default background images (Customizer can override per slide).
$defaults = array(
    // Community / home nursing — replace via Customizer or uploads/2026/03/needs-care-hero-slide-1.webp
    'https://images.unsplash.com/photo-1582750433449-648ed127bb54?q=80&w=2400&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1581578731548-c64695cc6952?q=80&w=2670&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1516549655169-df83a0774514?q=80&w=2670&auto=format&fit=crop',
    '',
    '',
);

// Optional uploaded hero for slide 1 (no Customizer change needed if file exists).
$hero_slide1_upload = '';
$needscare_uploads   = wp_get_upload_dir();
if ( ! empty( $needscare_uploads['basedir'] ) ) {
    $hero1_candidates = array( '2026/03/needs-care-hero-slide-1.webp', '2026/03/needs-care-hero-slide-1.jpg' );
    foreach ( $hero1_candidates as $hero1_rel ) {
        $hero1_path = trailingslashit( $needscare_uploads['basedir'] ) . $hero1_rel;
        if ( file_exists( $hero1_path ) ) {
            $hero_slide1_upload = trailingslashit( $needscare_uploads['baseurl'] ) . $hero1_rel;
            break;
        }
    }
}

// Short descriptions for screen readers (index matches slide order).
$hero_slide_image_descriptions = array(
    __( 'Needs Care nurses in Australia providing compassionate community and home-based support for all Australians, including First Nations peoples.', 'needscare' ),
    '',
    '',
    '',
    '',
);

$slide_count = absint( needscare_get( 'hero_slide_count', 3 ) );
if ( $slide_count < 1 ) $slide_count = 1;
if ( $slide_count > 5 ) $slide_count = 5;

$slides = array();
for ( $i = 1; $i <= $slide_count; $i++ ) {
    $custom_img = needscare_get( "hero_slide_{$i}_image", '' );
    // Retire legacy Customizer asset so theme default / upload can apply.
    if ( 1 === $i && is_string( $custom_img ) && $custom_img !== '' && false !== strpos( $custom_img, 'old-helping-scaled' ) ) {
        $custom_img = '';
    }

    if ( 1 === $i && $hero_slide1_upload ) {
        $bg = $hero_slide1_upload;
    } else {
        $bg = $custom_img ? $custom_img : ( isset( $defaults[ $i - 1 ] ) ? $defaults[ $i - 1 ] : '' );
    }
    if ( $bg ) {
        $slides[] = $bg;
    }
}

if ( empty( $slides ) ) {
    $slides[] = $defaults[0];
}

$total_slides = count( $slides );
?>

<section class="hero" id="hero-carousel" role="banner">
    <!-- Animated background particles -->
    <div class="hero-particles" aria-hidden="true">
        <div class="hero-particle hero-particle-1"></div>
        <div class="hero-particle hero-particle-2"></div>
        <div class="hero-particle hero-particle-3"></div>
        <div class="hero-particle hero-particle-4"></div>
        <div class="hero-particle hero-particle-5"></div>
    </div>

    <!-- Slides -->
    <div class="hero-carousel-track">
        <?php foreach ( $slides as $index => $bg_url ) : ?>
            <?php
            $hero_img_desc = isset( $hero_slide_image_descriptions[ $index ] ) ? trim( (string) $hero_slide_image_descriptions[ $index ] ) : '';
            $hero_slide_aria = $hero_img_desc
                ? sprintf(
                    /* translators: 1: image description, 2: slide number, 3: total slides */
                    esc_attr__( '%1$s — slide %2$d of %3$d', 'needscare' ),
                    $hero_img_desc,
                    $index + 1,
                    $total_slides
                )
                : sprintf( esc_attr__( 'Slide %1$d of %2$d', 'needscare' ), $index + 1, $total_slides );
            ?>
            <div class="hero-slide<?php echo $index === 0 ? ' active' : ''; ?>"
                 style="background-image: url('<?php echo esc_url( $bg_url ); ?>');"
                 role="group"
                 aria-label="<?php echo esc_attr( $hero_slide_aria ); ?>">

                <!-- Dark overlay -->
                <div class="hero-overlay" aria-hidden="true"></div>

                <!-- Content -->
                <div class="container hero-content">
                    <div class="hero-text-box">
                        <!-- Decorative badge -->
                        <div class="hero-badge">
                            <i class="fa-solid fa-heart-pulse"></i>
                            <span><?php esc_html_e( 'NDIS Registered Provider', 'needscare' ); ?></span>
                        </div>

                        <h1 class="hero-title"><?php echo esc_html( 'Experience the Best in Nursing Care with Needs Care' ); ?></h1>

                        <div class="hero-buttons">
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary hero-btn-main">
                                <i class="fa-solid fa-calendar-check"></i> Get Support Today
                            </a>
                        </div>

                        <!-- Trust indicators -->
                        <div class="hero-trust">
                            <div class="hero-trust-item">
                                <i class="fa-solid fa-shield-halved"></i>
                                <span>NDIS Approved</span>
                            </div>
                            <div class="hero-trust-divider"></div>
                            <div class="hero-trust-item">
                                <i class="fa-solid fa-clock"></i>
                                <span>24/7 Support</span>
                            </div>
                            <div class="hero-trust-divider"></div>
                            <div class="hero-trust-item">
                                <i class="fa-solid fa-star"></i>
                                <span>5-Star Rated</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ( $total_slides > 1 ) : ?>
        <!-- Arrow Navigation -->
        <button class="hero-arrow hero-arrow-prev" id="hero-prev" aria-label="<?php esc_attr_e( 'Previous slide', 'needscare' ); ?>">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="hero-arrow hero-arrow-next" id="hero-next" aria-label="<?php esc_attr_e( 'Next slide', 'needscare' ); ?>">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

        <!-- Slide Progress Indicators -->
        <div class="hero-indicators" role="tablist" aria-label="<?php esc_attr_e( 'Slide navigation', 'needscare' ); ?>">
            <?php for ( $i = 0; $i < $total_slides; $i++ ) : ?>
                <button
                    class="hero-indicator<?php echo $i === 0 ? ' active' : ''; ?>"
                    role="tab"
                    aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                    aria-label="<?php printf( esc_attr__( 'Go to slide %d', 'needscare' ), $i + 1 ); ?>"
                    data-slide="<?php echo $i; ?>"
                >
                    <span class="hero-indicator-fill"></span>
                </button>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

    <!-- Scroll down hint -->
    <div class="hero-scroll-hint" aria-hidden="true">
        <span><?php esc_html_e( 'Scroll', 'needscare' ); ?></span>
        <div class="hero-scroll-line"></div>
    </div>
</section>
