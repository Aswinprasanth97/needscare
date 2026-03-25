<?php
/**
 * Template Part: Services Section — Premium Design
 *
 * @package NeedsCare
 */

$services = needscare_get_service_definitions();
?>

<!-- Services Section -->
<section class="services-section section" id="our-services">
    <div class="container">
        <!-- Header -->
        <div class="services-header">
            <div class="services-header-text">
                <h4 class="section-subtitle">OUR SERVICES</h4>
                <h2 class="section-title">Comprehensive Support for Every Need</h2>
                <p class="services-header-desc">We provide a wide range of disability and nursing support services to help individuals live independently and comfortably.</p>
            </div>
            <div class="services-header-cta">
                <a href="<?php echo esc_url( needscare_contact_tel_href() ?: 'tel:0468370705' ); ?>" class="btn btn-primary services-call-btn">
                    <i class="fa-solid fa-phone"></i>
                    Call <?php echo esc_html( needscare_get( 'contact_phone', '0468 370 705' ) ); ?>
                </a>
            </div>
        </div>

        <div class="services-grid">
            <?php
            $index = 0;
            foreach ( $services as $slug => $service ) :
                $icon_fa = needscare_get_service_icon_fa( $slug );
                ?>
                <a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>" class="svc-card" style="--svc-delay: <?php echo esc_attr( $index * 0.08 ); ?>s">
                    <div class="svc-icon-wrap">
                        <i class="fa-solid <?php echo esc_attr( $icon_fa ); ?>"></i>
                    </div>
                    <h3 class="svc-title"><?php echo esc_html( $service['title'] ); ?></h3>
                    <p class="svc-desc"><?php echo esc_html( $service['desc'] ); ?></p>
                    <span class="svc-arrow" aria-hidden="true">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </a>
                <?php
                ++$index;
            endforeach;
            ?>
        </div>

        <div class="services-bottom-cta">
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-outline services-view-btn">
                View All Services
            </a>
        </div>
    </div>
</section>
