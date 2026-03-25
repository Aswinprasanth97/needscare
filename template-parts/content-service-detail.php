<?php
/**
 * Service detail page body (used by page-service-detail.php and page-{slug}.php templates).
 *
 * @package NeedsCare
 */

$current_slug = get_post_field( 'post_name', get_post() );
$defs         = needscare_get_service_definitions();
$data         = isset( $defs[ $current_slug ] ) ? $defs[ $current_slug ] : array( 'intro' => '', 'body' => '' );
?>

<?php if ( needscare_is_elementor_page() ) : ?>

    <div class="elementor-page-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>

<?php else : ?>

    <?php
    $needscare_service_post_id = (int) get_queried_object_id();
    $needscare_feature_rel     = needscare_get_service_default_featured_rel_path( $current_slug );
    $needscare_has_attachment  = $needscare_service_post_id && has_post_thumbnail( $needscare_service_post_id );
    $needscare_has_fallback    = '' !== $needscare_feature_rel;
    $needscare_has_media       = $needscare_has_attachment || $needscare_has_fallback;
    $needscare_img_alt         = wp_strip_all_tags( get_the_title() );
    ?>
    <section class="service-detail-featured-section" aria-labelledby="service-detail-title">
        <div class="service-detail-featured-media<?php echo $needscare_has_media ? ' has-media' : ' no-media'; ?>">
            <?php if ( $needscare_has_attachment ) : ?>
                <figure class="service-detail-featured-figure">
                    <?php
                    $needscare_thumb_id  = get_post_thumbnail_id( $needscare_service_post_id );
                    $needscare_thumb_alt = get_post_meta( $needscare_thumb_id, '_wp_attachment_image_alt', true );
                    if ( '' === $needscare_thumb_alt ) {
                        $needscare_thumb_alt = $needscare_img_alt;
                    }
                    echo get_the_post_thumbnail(
                        $needscare_service_post_id,
                        'needscare-service-featured',
                        array(
                            'class'    => 'service-detail-featured-img',
                            'loading'  => 'eager',
                            'decoding' => 'async',
                            'alt'      => $needscare_thumb_alt,
                        )
                    );
                    ?>
                </figure>
            <?php elseif ( $needscare_has_fallback ) : ?>
                <figure class="service-detail-featured-figure">
                    <?php
                    printf(
                        '<img class="service-detail-featured-img" src="%s" alt="%s" width="1200" height="630" loading="eager" decoding="async" />',
                        esc_url( NEEDSCARE_URI . '/' . $needscare_feature_rel ),
                        esc_attr( $needscare_img_alt )
                    );
                    ?>
                </figure>
            <?php endif; ?>

            <div class="service-detail-featured-scrim" aria-hidden="true"></div>

            <div class="container service-detail-featured-headline">
                <nav class="service-detail-featured-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'needscare' ); ?>">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'needscare' ); ?></a>
                    <span class="service-detail-featured-breadcrumb-sep" aria-hidden="true">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'needscare' ); ?></a>
                    <span class="service-detail-featured-breadcrumb-sep" aria-hidden="true">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                    <span class="service-detail-featured-breadcrumb-current"><?php the_title(); ?></span>
                </nav>
                <h1 id="service-detail-title" class="service-detail-featured-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="service-detail-content">
                <?php if ( ! empty( $data['intro'] ) ) : ?>
                    <p class="service-detail-intro"><?php echo esc_html( $data['intro'] ); ?></p>
                <?php endif; ?>

                <div class="page-content">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        $needscare_post     = get_post();
                        $needscare_has_body = $needscare_post && strlen( trim( wp_strip_all_tags( $needscare_post->post_content ) ) ) > 0;
                        if ( $needscare_has_body ) {
                            the_content();
                        } elseif ( ! empty( $data['body'] ) ) {
                            echo wp_kses_post( $data['body'] );
                        }
                    endwhile;
                    ?>
                </div>

                <div class="service-detail-cta">
                    <a href="<?php echo esc_url( home_url( '/referral/' ) ); ?>" class="btn btn-primary">MAKE A REFERRAL</a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline">CONTACT US</a>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
