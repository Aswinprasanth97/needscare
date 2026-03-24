<?php
/**
 * Template Part: Services Section — Premium Design
 *
 * @package NeedsCare
 */

$services = array(
    array(
        'icon'  => 'fa-solid fa-handshake',
        'title' => 'Assist-Life Stage, Transition',
        'desc'  => 'Support to manage life stages, transitions, and supports to foster independence.',
        'link'  => home_url( '/assist-life-stage-transition/' ),
    ),
    array(
        'icon'  => 'fa-solid fa-person-walking-with-cane',
        'title' => 'Assist-Personal Activities',
        'desc'  => 'Assistance with daily personal activities to enable people to live as autonomously as possible.',
        'link'  => home_url( '/assist-personal-activities/' ),
    ),
    array(
        'icon'  => 'fa-solid fa-car-side',
        'title' => 'Assist-Travel/Transport',
        'desc'  => 'Assistance with travel and transport arrangements for community, social, or economic participation.',
        'link'  => home_url( '/assist-travel-transport/' ),
    ),
    array(
        'icon'  => 'fa-solid fa-user-nurse',
        'title' => 'Community Nursing Care',
        'desc'  => 'A wide range of nursing support services to help manage daily living activities within the comfort of home.',
        'link'  => home_url( '/community-nursing-care/' ),
    ),
    array(
        'icon'  => 'fa-solid fa-house-user',
        'title' => 'Daily Tasks/Shared Living',
        'desc'  => 'Assistance with daily life tasks in a group or shared living arrangement.',
        'link'  => home_url( '/daily-tasks-shared-living/' ),
    ),
    array(
        'icon'  => 'fa-solid fa-lightbulb',
        'title' => 'Innov Community Participation',
        'desc'  => 'Innovative community participation focused on building skills for independence and well-being.',
        'link'  => home_url( '/innov-community-participation/' ),
    ),
    array(
        'icon'  => 'fa-solid fa-chart-line',
        'title' => 'Development-Life Skills',
        'desc'  => 'Development of daily living and life skills to increase independence in the community.',
        'link'  => home_url( '/development-life-skills/' ),
    ),
    array(
        'icon'  => 'fa-solid fa-broom',
        'title' => 'Household Tasks',
        'desc'  => 'Support staff to assist with household tasks to maintain a clean and safe home environment.',
        'link'  => home_url( '/household-tasks/' ),
    ),
    array(
        'icon'  => 'fa-solid fa-city',
        'title' => 'Participate Community',
        'desc'  => 'Support to safely and actively participate in community, social, and civic activities.',
        'link'  => home_url( '/participate-community/' ),
    ),
    array(
        'icon'  => 'fa-solid fa-users',
        'title' => 'Group/Centre Activities',
        'desc'  => 'Assistance to access and participate in group-based community, social, and recreational activities.',
        'link'  => home_url( '/group-centre-activities/' ),
    ),
);
?>

<!-- Services Section -->
<section class="services-section section" id="our-services">
    <div class="container">
        <!-- Header -->
        <div class="services-header">
            <div class="services-header-text">
                <h4 class="section-subtitle"><i class="fa-solid fa-hand-holding-heart"></i> Our Services</h4>
                <h2 class="section-title">Our Services Overview</h2>
                <p class="services-header-desc">We provide a wide range of disability and nursing support services to help individuals live independently and comfortably.</p>
            </div>
            <div class="services-header-cta">
                <a href="tel:<?php echo esc_attr( str_replace( ' ', '', (string) needscare_get( 'contact_phone', '0468370705' ) ) ); ?>" class="btn btn-primary services-call-btn">
                    <i class="fa-solid fa-phone"></i>
                    Call <?php echo esc_html( needscare_get( 'contact_phone', '0468 370 705' ) ); ?>
                </a>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="services-grid">
            <?php foreach ( $services as $index => $service ) : ?>
                <a href="<?php echo esc_url( $service['link'] ); ?>" class="svc-card" style="--svc-delay: <?php echo $index * 0.08; ?>s">
                    <div class="svc-card-shine" aria-hidden="true"></div>
                    <div class="svc-icon-wrap">
                        <i class="<?php echo esc_attr( $service['icon'] ); ?>"></i>
                    </div>
                    <h3 class="svc-title"><?php echo esc_html( $service['title'] ); ?></h3>
                    <p class="svc-desc"><?php echo esc_html( $service['desc'] ); ?></p>
                    <span class="svc-arrow" aria-hidden="true">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- CTA -->
        <div class="services-bottom-cta">
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-outline services-view-btn">
                View All Services <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
