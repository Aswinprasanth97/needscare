<?php
/**
 * Template Name: About Us Page
 * A modern, premium About Us page for Needs Care.
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

    <!-- ════════════════════════════════════════════════════════
         HERO SECTION
         ════════════════════════════════════════════════════════ -->
    <section class="abt-hero">
        <div class="abt-hero-overlay" aria-hidden="true"></div>
        <!-- Floating particles -->
        <div class="abt-hero-particles" aria-hidden="true">
            <div class="abt-particle abt-particle-1"></div>
            <div class="abt-particle abt-particle-2"></div>
            <div class="abt-particle abt-particle-3"></div>
        </div>
        <div class="container abt-hero-inner">
            <nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'needscare' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house"></i> <?php esc_html_e( 'Home', 'needscare' ); ?></a>
                <span class="breadcrumb-sep" aria-hidden="true">/</span>
                <span class="breadcrumb-current"><?php esc_html_e( 'About Us', 'needscare' ); ?></span>
            </nav>
            <h1 class="abt-hero-title">Compassionate Nursing &amp; Disability Support You Can Trust</h1>
            <p class="abt-hero-subtitle">Needs Care provides personalised nursing and disability support services to help individuals live safely, independently, and with dignity.</p>
            <div class="abt-hero-actions">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary abt-hero-btn">
                    <i class="fa-solid fa-envelope"></i> Contact Us
                </a>
                <a href="<?php echo esc_url( home_url( '/referral/' ) ); ?>" class="btn btn-outline abt-hero-btn-outline">
                    <i class="fa-solid fa-paper-plane"></i> Make a Referral
                </a>
            </div>
        </div>
        <!-- Wave divider -->
        <div class="abt-hero-wave" aria-hidden="true">
            <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0,70 C360,10 720,90 1440,35 L1440,100 L0,100 Z" fill="var(--off-white)"/>
            </svg>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════
         SECTION 1 — ABOUT NEEDS CARE
         ════════════════════════════════════════════════════════ -->
    <section class="abt-intro section" id="about-intro">
        <div class="container">
            <div class="abt-intro-grid">
                <!-- Text Column -->
                <div class="abt-intro-text reveal-on-scroll">
                    <h4 class="section-subtitle"><i class="fa-solid fa-heart-pulse"></i> Who We Are</h4>
                    <h2 class="section-title">About Needs Care</h2>
                    <p>Needs Care is dedicated to providing compassionate and professional healthcare and disability support services. Our experienced nurses and support workers focus on improving the well-being, independence, and quality of life of every individual we support.</p>
                    <p>We believe everyone deserves respectful care, dignity, and the opportunity to live a fulfilling life. Our team works closely with participants and families to create personalised support plans tailored to their unique needs.</p>

                </div>
                <!-- Image Column -->
                <div class="abt-intro-visual reveal-on-scroll">
                    <div class="abt-img-stack">
                        <div class="abt-img-main">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/indigenous-care-main.png' ); ?>" alt="Nurse caring for indigenous Australian patient" loading="lazy" />
                        </div>
                        <div class="abt-img-accent">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/indigenous-care-accent.png' ); ?>" alt="Support worker assisting indigenous Australian" loading="lazy" />
                        </div>
                        <div class="abt-img-badge">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>NDIS<br>Registered</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════
         SECTION 2 — MISSION & VISION
         ════════════════════════════════════════════════════════ -->
    <section class="abt-mv section section-bg-light" id="mission-vision">
        <div class="container">
            <div class="text-center reveal-on-scroll">
                <h4 class="section-subtitle"><i class="fa-solid fa-compass"></i> Our Purpose</h4>
                <h2 class="section-title">Mission &amp; Vision</h2>
            </div>
            <div class="abt-mv-grid mt-50">
                <div class="abt-mv-card abt-mv-mission reveal-on-scroll">
                    <div class="abt-mv-icon">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>Our mission is to deliver high-quality healthcare and disability support services that empower individuals to live healthier and more independent lives. We provide compassionate care through skilled nurses and dedicated support workers.</p>
                    <div class="abt-mv-accent" aria-hidden="true"></div>
                </div>
                <div class="abt-mv-card abt-mv-vision reveal-on-scroll">
                    <div class="abt-mv-icon">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>Our vision is to become a trusted provider of personalised care services that promote independence, dignity, and community participation.</p>
                    <div class="abt-mv-accent" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════
         SECTION 3 — WHY CHOOSE NEEDS CARE
         ════════════════════════════════════════════════════════ -->
    <section class="abt-why section" id="why-choose">
        <div class="abt-why-bg" aria-hidden="true">
            <div class="abt-why-shape abt-why-shape-1"></div>
            <div class="abt-why-shape abt-why-shape-2"></div>
            <div class="abt-why-shape abt-why-shape-3"></div>
        </div>
        <div class="container">
            <div class="text-center reveal-on-scroll" style="position:relative;z-index:1;">
                <h4 class="section-subtitle" style="color:rgba(255,255,255,0.7);"><i class="fa-solid fa-award"></i> Why Choose Us</h4>
                <h2 class="section-title" style="color:#fff;">Why Choose Needs Care</h2>
            </div>
            <div class="abt-why-grid mt-50">
                <div class="abt-why-card reveal-on-scroll">
                    <div class="abt-why-card-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <h3>Expert Team</h3>
                    <p>Experienced nurses and support workers committed to patient safety and quality care.</p>
                </div>
                <div class="abt-why-card reveal-on-scroll">
                    <div class="abt-why-card-icon">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                    </div>
                    <h3>Personalised Care</h3>
                    <p>Individualised support plans designed around each participant's needs.</p>
                </div>
                <div class="abt-why-card reveal-on-scroll">
                    <div class="abt-why-card-icon">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Reliable support whenever assistance is needed, around the clock.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════
         SECTION 4 — OUR SERVICES
         ════════════════════════════════════════════════════════ -->
    <section class="abt-services section" id="about-services">
        <div class="container">
            <div class="text-center reveal-on-scroll">
                <h4 class="section-subtitle"><i class="fa-solid fa-hand-holding-medical"></i> What We Offer</h4>
                <h2 class="section-title">Our Services</h2>
                <p class="abt-services-desc">We provide a comprehensive range of disability and nursing support services to empower independence.</p>
            </div>
            <div class="abt-services-grid mt-50">
                <?php
                $about_services = array(
                    array( 'icon' => 'fa-solid fa-house-chimney-user',    'title' => 'Household Tasks' ),
                    array( 'icon' => 'fa-solid fa-van-shuttle',           'title' => 'Assistance with Travel & Transport' ),
                    array( 'icon' => 'fa-solid fa-hand-holding-medical',  'title' => 'High-Intensity Daily Personal Activities' ),
                    array( 'icon' => 'fa-solid fa-user-nurse',            'title' => 'Community Nursing Care' ),
                    array( 'icon' => 'fa-solid fa-people-roof',           'title' => 'Daily Life Tasks in Shared Living' ),
                    array( 'icon' => 'fa-solid fa-people-pulling',        'title' => 'Innovative Community Participation' ),
                    array( 'icon' => 'fa-solid fa-users-rectangle',       'title' => 'Social & Civic Participation' ),
                    array( 'icon' => 'fa-solid fa-building-user',         'title' => 'Group-Based Centre Activities' ),
                    array( 'icon' => 'fa-solid fa-graduation-cap',        'title' => 'Development & Life Skills' ),
                    array( 'icon' => 'fa-solid fa-diagram-project',       'title' => 'Support Coordination & Life Transitions' ),
                );
                foreach ( $about_services as $i => $svc ) : ?>
                    <div class="abt-svc-item reveal-on-scroll" style="--abt-svc-delay: <?php echo $i * 0.06; ?>s">
                        <div class="abt-svc-icon">
                            <i class="<?php echo esc_attr( $svc['icon'] ); ?>"></i>
                        </div>
                        <h4><?php echo esc_html( $svc['title'] ); ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════
         SECTION 5 — CALL TO ACTION
         ════════════════════════════════════════════════════════ -->
    <section class="abt-cta">
        <div class="abt-cta-bg" aria-hidden="true">
            <div class="abt-cta-shape abt-cta-shape-1"></div>
            <div class="abt-cta-shape abt-cta-shape-2"></div>
        </div>
        <div class="container abt-cta-inner">
            <div class="abt-cta-content reveal-on-scroll">
                <h2>Need Personalised Care &amp; Support?</h2>
                <p>Our dedicated team is ready to help you or your loved ones live safely and independently.</p>
                <div class="abt-cta-buttons">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary abt-cta-btn">
                        <i class="fa-solid fa-envelope"></i> Contact Us
                    </a>
                    <a href="<?php echo esc_url( home_url( '/referral/' ) ); ?>" class="btn abt-cta-btn-alt">
                        <i class="fa-solid fa-heart-pulse"></i> Get Support Today
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- WordPress Editor Content (if any) -->
    <?php while ( have_posts() ) : the_post(); ?>
        <?php if ( get_the_content() ) : ?>
            <section class="section">
                <div class="container">
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>

<?php endif; ?>

</main>

<?php get_footer(); ?>
