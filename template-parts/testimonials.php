<?php
/**
 * Template Part: Testimonials Section — Premium Carousel
 *
 * Reads from Custom Post Type (Testimonials).
 * @package NeedsCare
 */

$args = array(
    'post_type'      => 'testimonial',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

$query = new WP_Query( $args );
$testimonials = array();

if ( ! $query->have_posts() ) {
    return;
}

while ( $query->have_posts() ) {
    $query->the_post();
    $testimonials[] = array(
        'name'   => get_the_title(),
        'role'   => get_post_meta( get_the_ID(), '_testimonial_role', true ),
        'quote'  => get_the_content(),
        'rating' => absint( get_post_meta( get_the_ID(), '_testimonial_rating', true ) ?: 5 ),
        'image'  => get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ),
    );
}
wp_reset_postdata();

$total = count( $testimonials );
?>

<section class="testimonials-section" id="testimonials">
    <!-- Decorative background -->
    <div class="testimonials-bg" aria-hidden="true">
        <div class="testimonials-bg-shape testimonials-bg-shape-1"></div>
        <div class="testimonials-bg-shape testimonials-bg-shape-2"></div>
        <div class="testimonials-bg-shape testimonials-bg-shape-3"></div>
    </div>

    <div class="container">
        <!-- Section header -->
        <div class="testimonials-header text-center reveal-on-scroll">
            <h4 class="section-subtitle"><i class="fa-solid fa-quote-left"></i> Testimonials</h4>
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="testimonials-header-desc">Real stories from families and participants we've had the privilege of supporting through their NDIS journey.</p>
        </div>

        <!-- Carousel wrapper -->
        <div class="testimonials-carousel" id="testimonials-carousel" role="region" aria-label="<?php esc_attr_e( 'Client testimonials', 'needscare' ); ?>">

            <!-- Track -->
            <div class="testimonials-track" id="testimonials-track">
                <?php foreach ( $testimonials as $index => $t ) : ?>
                    <div class="tcard<?php echo $index === 0 ? ' active' : ''; ?>" role="group" aria-label="<?php printf( esc_attr__( 'Testimonial %1$d of %2$d', 'needscare' ), $index + 1, $total ); ?>">
                        <div class="tcard-inner">
                            <!-- Large quote watermark -->
                            <div class="tcard-quote-bg" aria-hidden="true">
                                <i class="fa-solid fa-quote-right"></i>
                            </div>

                            <!-- Stars -->
                            <div class="tcard-stars" aria-label="<?php printf( esc_attr__( '%d out of 5 stars', 'needscare' ), $t['rating'] ); ?>">
                                <?php for ( $s = 0; $s < $t['rating']; $s++ ) : ?>
                                    <i class="fa-solid fa-star"></i>
                                <?php endfor; ?>
                            </div>

                            <!-- Quote -->
                            <blockquote class="tcard-text">
                                <p>&ldquo;<?php echo wp_kses_post( $t['quote'] ); ?>&rdquo;</p>
                            </blockquote>

                            <!-- Author -->
                            <div class="tcard-author">
                                <div class="tcard-avatar">
                                    <?php if ( ! empty( $t['image'] ) ) : ?>
                                        <img src="<?php echo esc_url( $t['image'] ); ?>" alt="<?php echo esc_attr( $t['name'] ); ?>" />
                                    <?php else : ?>
                                        <span><?php echo esc_html( function_exists( 'mb_substr' ) ? mb_substr( $t['name'], 0, 1 ) : substr( (string) $t['name'], 0, 1 ) ); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="tcard-author-info">
                                    <strong class="tcard-name"><?php echo esc_html( $t['name'] ); ?></strong>
                                    <span class="tcard-role"><?php echo esc_html( $t['role'] ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ( $total > 1 ) : ?>
                <!-- Navigation arrows -->
                <button class="tcarousel-arrow tcarousel-arrow-prev" id="tcarousel-prev" aria-label="<?php esc_attr_e( 'Previous testimonial', 'needscare' ); ?>">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="tcarousel-arrow tcarousel-arrow-next" id="tcarousel-next" aria-label="<?php esc_attr_e( 'Next testimonial', 'needscare' ); ?>">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            <?php endif; ?>
        </div>

        <?php if ( $total > 1 ) : ?>
            <!-- Dots navigation -->
            <div class="tcarousel-dots" id="tcarousel-dots" role="tablist" aria-label="<?php esc_attr_e( 'Testimonial navigation', 'needscare' ); ?>">
                <?php foreach ( $testimonials as $index => $t ) : ?>
                    <button
                        class="tcarousel-dot<?php echo $index === 0 ? ' active' : ''; ?>"
                        role="tab"
                        aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                        aria-label="<?php printf( esc_attr__( 'Go to testimonial %d', 'needscare' ), $index + 1 ); ?>"
                        data-index="<?php echo $index; ?>"
                    ></button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
