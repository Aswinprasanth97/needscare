<?php
/**
 * Template Name: Gallery Page
 *
 * Add images: insert a Gallery block, or upload images attached to this page.
 * Intro text: everything except galleries is shown above the grid.
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

    <?php
    while ( have_posts() ) :
        the_post();
        $intro_raw = needscare_get_page_content_without_gallery( get_the_ID() );
        $intro_raw = trim( (string) $intro_raw );
        $gallery_ids = needscare_get_gallery_image_ids( get_the_ID() );
        $gallery_items = array();
        foreach ( $gallery_ids as $aid ) {
            if ( ! wp_attachment_is_image( $aid ) ) {
                continue;
            }
            $full = wp_get_attachment_image_src( $aid, 'full' );
            if ( $full ) {
                $gallery_items[] = $aid;
            }
        }
        ?>

    <section class="gal-intro-section section" aria-labelledby="gal-intro-heading">
        <div class="container gal-intro-inner">
            <div class="gal-intro-head reveal-on-scroll">
                <span class="gal-intro-badge"><i class="fa-solid fa-images" aria-hidden="true"></i> <?php esc_html_e( 'Gallery', 'needscare' ); ?></span>
                <h2 id="gal-intro-heading" class="gal-intro-title"><?php esc_html_e( 'Moments from our care community', 'needscare' ); ?></h2>
                <p class="gal-intro-lead"><?php esc_html_e( 'A glimpse of the compassionate support, teamwork, and environments where we serve participants every day.', 'needscare' ); ?></p>
            </div>
            <?php if ( $intro_raw !== '' ) : ?>
                <div class="gal-intro-content entry-content reveal-on-scroll">
                    <?php echo apply_filters( 'the_content', $intro_raw ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="gal-grid-section" aria-label="<?php esc_attr_e( 'Photo gallery', 'needscare' ); ?>">
        <div class="gal-grid-section-bg" aria-hidden="true"></div>
        <div class="container">
            <?php if ( ! empty( $gallery_items ) ) : ?>
                <ul class="gal-grid" id="needscare-gallery">
                    <?php
                    $i = 0;
                    foreach ( $gallery_items as $attachment_id ) :
                        $full = wp_get_attachment_image_src( $attachment_id, 'full' );
                        $alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
                        if ( ! is_string( $alt ) ) {
                            $alt = '';
                        }
                        $caption = wp_get_attachment_caption( $attachment_id );
                        if ( ! is_string( $caption ) ) {
                            $caption = '';
                        }
                        $delay = min( 0.55, 0.04 * $i );
                        ++$i;
                        ?>
                    <li class="gal-item" style="--gal-delay: <?php echo esc_attr( $delay ); ?>s">
                        <button
                            type="button"
                            class="gal-item-btn"
                            data-gal-src="<?php echo esc_url( $full[0] ); ?>"
                            data-gal-w="<?php echo esc_attr( (string) $full[1] ); ?>"
                            data-gal-h="<?php echo esc_attr( (string) $full[2] ); ?>"
                            data-gal-alt="<?php echo esc_attr( $alt ); ?>"
                            data-gal-cap="<?php echo esc_attr( $caption ); ?>"
                        >
                            <span class="gal-item-frame">
                                <?php
                                echo wp_get_attachment_image(
                                    $attachment_id,
                                    'medium_large',
                                    false,
                                    array(
                                        'class'   => 'gal-item-img',
                                        'loading' => 'lazy',
                                        'sizes'   => '(min-width: 1200px) 380px, (min-width: 768px) 33vw, 50vw',
                                    )
                                );
                                ?>
                                <span class="gal-item-shade" aria-hidden="true"></span>
                                <span class="gal-item-zoom" aria-hidden="true">
                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                </span>
                            </span>
                            <?php if ( $caption !== '' ) : ?>
                                <span class="gal-item-label"><?php echo esc_html( wp_trim_words( $caption, 12 ) ); ?></span>
                            <?php endif; ?>
                        </button>
                    </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <div class="gal-empty reveal-on-scroll">
                    <div class="gal-empty-icon" aria-hidden="true"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                    <h3 class="gal-empty-title"><?php esc_html_e( 'Add your first photos', 'needscare' ); ?></h3>
                    <p class="gal-empty-text"><?php esc_html_e( 'Edit this page in the block editor, add a Gallery block and pick images, or upload files so they are attached to this page. They will appear here automatically.', 'needscare' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if ( ! empty( $gallery_items ) ) : ?>
    <div class="gal-lightbox" id="gal-lightbox" hidden data-gal-lightbox>
        <div class="gal-lightbox-backdrop" data-gal-close tabindex="-1" aria-hidden="true"></div>
        <div
            class="gal-lightbox-dialog"
            role="dialog"
            aria-modal="true"
            aria-label="<?php esc_attr_e( 'Enlarged image', 'needscare' ); ?>"
        >
            <button type="button" class="gal-lightbox-close" data-gal-close aria-label="<?php esc_attr_e( 'Close gallery', 'needscare' ); ?>">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
            <button type="button" class="gal-lightbox-nav gal-lightbox-prev" data-gal-prev aria-label="<?php esc_attr_e( 'Previous image', 'needscare' ); ?>">
                <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            </button>
            <button type="button" class="gal-lightbox-nav gal-lightbox-next" data-gal-next aria-label="<?php esc_attr_e( 'Next image', 'needscare' ); ?>">
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
            </button>
            <figure class="gal-lightbox-figure">
                <img src="" alt="" class="gal-lightbox-img" decoding="async" />
                <figcaption class="gal-lightbox-caption"></figcaption>
            </figure>
        </div>
    </div>
    <?php endif; ?>

    <?php endwhile; ?>

<?php endif; ?>

</main>

<?php
get_footer();
