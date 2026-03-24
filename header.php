<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    $meta_desc = "Needs Care provides high-quality nursing and disability support services (NDIS) in Australia. Compassionate care tailored to your needs.";
    if ( is_page() ) {
        $page_desc = get_post_field( 'post_content', get_the_ID() );
        if ( ! empty( $page_desc ) ) {
            $meta_desc = wp_trim_words( strip_shortcodes( $page_desc ), 25 );
        }
    }
    ?>
    <meta name="description" content="<?php echo esc_attr( $meta_desc ); ?>" />
    <meta name="keywords" content="Nursing Care, NDIS Provider, Disability Support, Home Care, Community Nursing, Needs Care" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip to Content — WCAG 2.4.1 -->
<a class="skip-to-content" href="#main-content"><?php esc_html_e( 'Skip to main content', 'needscare' ); ?></a>

<?php
$needscare_uploads   = wp_get_upload_dir();
$needscare_ndis_badge = ( ! empty( $needscare_uploads['baseurl'] ) )
	? trailingslashit( $needscare_uploads['baseurl'] ) . '2026/03/we-ndis-logo-img.png'
	: '';
?>

<!-- Header / Navigation -->
<header class="header" id="site-header" role="banner">
    <div class="container header-container">
        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — <?php esc_attr_e( 'Home', 'needscare' ); ?>">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="logo-icon" aria-hidden="true">&#x2624;</span>
                <div class="logo-text">
                    <h2><?php bloginfo( 'name' ); ?></h2>
                    <p><?php bloginfo( 'description' ); ?></p>
                </div>
            <?php endif; ?>
        </a>

        <!-- Navigation -->
        <nav class="nav" id="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'needscare' ); ?>">
            <div class="nav-panel">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'nav-list',
                    'walker'         => new NeedsCare_Walker_Nav(),
                    'fallback_cb'    => false,
                ) );
                ?>
            <?php else : ?>
                <ul class="nav-list">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link<?php echo is_front_page() ? ' active' : ''; ?>">Home</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="nav-link<?php echo is_page( 'about-us' ) ? ' active' : ''; ?>">About Us</a></li>
                    <li class="dropdown">
                        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="nav-link<?php echo is_page( 'services' ) || is_page( array( 'assist-life-stage-transition', 'assist-personal-activities', 'assist-travel-transport', 'community-nursing-care', 'daily-tasks-shared-living', 'innov-community-participation', 'development-life-skills', 'household-tasks', 'participate-community', 'group-centre-activities' ) ) ? ' active' : ''; ?>">Services<span class="nav-link-caret" aria-hidden="true"> &#9662;</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo esc_url( home_url( '/assist-life-stage-transition/' ) ); ?>">Assist-Life Stage, Transition</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/assist-personal-activities/' ) ); ?>">Assist-Personal Activities</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/assist-travel-transport/' ) ); ?>">Assist-Travel/Transport</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/community-nursing-care/' ) ); ?>">Community Nursing Care</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/daily-tasks-shared-living/' ) ); ?>">Daily Tasks/Shared Living</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/innov-community-participation/' ) ); ?>">Innov Community Participation</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/development-life-skills/' ) ); ?>">Development-Life Skills</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/household-tasks/' ) ); ?>">Household Tasks</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/participate-community/' ) ); ?>">Participate Community</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/group-centre-activities/' ) ); ?>">Group/Centre Activities</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link">Resources<span class="nav-link-caret" aria-hidden="true"> &#9662;</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo esc_url( home_url( '/referral/' ) ); ?>">Referral</a></li>
                            <li><a href="https://www.ndis.gov.au/providers/pricing-arrangements#ndis-pricing-arrangements-and-price-limits" target="_blank" rel="noopener">Pricing Arrangements</a></li>
                            <li><a href="https://www.ndis.gov.au/" target="_blank" rel="noopener">NDIS</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url( home_url( '/career/' ) ); ?>" class="nav-link<?php echo is_page( 'career' ) ? ' active' : ''; ?>">Career</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nav-link<?php echo is_page( 'contact' ) ? ' active' : ''; ?>">Contact Us</a></li>
                </ul>
            <?php endif; ?>

                <div class="nav-mobile-footer">
                    <a href="<?php echo esc_url( home_url( '/referral/' ) ); ?>" class="btn btn-primary nav-mobile-referral"><?php esc_html_e( 'REFERRAL', 'needscare' ); ?></a>
                    <?php if ( $needscare_ndis_badge ) : ?>
                        <div class="nav-mobile-trust">
                            <img src="<?php echo esc_url( $needscare_ndis_badge ); ?>" alt="" width="44" height="44" class="nav-mobile-trust-img" decoding="async" />
                            <span class="nav-mobile-trust-text"><?php esc_html_e( 'Registered NDIS provider', 'needscare' ); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <!-- CTA & Badge -->
        <div class="header-actions">
            <a href="<?php echo esc_url( home_url( '/referral/' ) ); ?>" class="btn btn-primary header-referral-desktop"><?php esc_html_e( 'REFERRAL', 'needscare' ); ?></a>
            <div class="ndis-badge ndis-badge-desktop">
                <?php if ( $needscare_ndis_badge ) : ?>
                    <img src="<?php echo esc_url( $needscare_ndis_badge ); ?>" alt="<?php esc_attr_e( 'NDIS Registered Provider', 'needscare' ); ?>" decoding="async" />
                <?php endif; ?>
            </div>
            <!-- Mobile Menu Toggle -->
            <button type="button" class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="main-nav" data-label-open="<?php echo esc_attr__( 'Open menu', 'needscare' ); ?>" data-label-close="<?php echo esc_attr__( 'Close menu', 'needscare' ); ?>" aria-label="<?php echo esc_attr__( 'Open menu', 'needscare' ); ?>">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <div class="nav-backdrop" id="nav-backdrop" aria-hidden="true" hidden></div>
</header>
