<?php
/**
 * Template Name: Services Page
 *
 * @package NeedsCare
 */

get_header();

$services = array(
    array( 'icon' => 'fa-handshake',               'title' => 'Assist-Life Stage, Transition', 'desc' => 'Support to manage life stages, transitions, and supports to foster independence.', 'slug' => 'assist-life-stage-transition' ),
    array( 'icon' => 'fa-person-walking-with-cane','title' => 'Assist-Personal Activities',    'desc' => 'Assistance with daily personal activities to enable people to live as autonomously as possible.', 'slug' => 'assist-personal-activities' ),
    array( 'icon' => 'fa-car-side',                'title' => 'Assist-Travel/Transport',       'desc' => 'Assistance with travel and transport arrangements for community, social, or economic participation.', 'slug' => 'assist-travel-transport' ),
    array( 'icon' => 'fa-user-nurse',              'title' => 'Community Nursing Care',        'desc' => 'A wide range of nursing support services to help manage daily living activities within the comfort of home.', 'slug' => 'community-nursing-care' ),
    array( 'icon' => 'fa-house-user',              'title' => 'Daily Tasks/Shared Living',     'desc' => 'Assistance with daily life tasks in a group or shared living arrangement.', 'slug' => 'daily-tasks-shared-living' ),
    array( 'icon' => 'fa-lightbulb',               'title' => 'Innov Community Participation', 'desc' => 'Innovative community participation focused on building skills for independence and well-being.', 'slug' => 'innov-community-participation' ),
    array( 'icon' => 'fa-chart-line',              'title' => 'Development-Life Skills',       'desc' => 'Development of daily living and life skills to increase independence in the community.', 'slug' => 'development-life-skills' ),
    array( 'icon' => 'fa-broom',                   'title' => 'Household Tasks',               'desc' => 'Support staff to assist with household tasks to maintain a clean and safe home environment.', 'slug' => 'household-tasks' ),
    array( 'icon' => 'fa-city',                    'title' => 'Participate Community',         'desc' => 'Support to safely and actively participate in community, social, and civic activities.', 'slug' => 'participate-community' ),
    array( 'icon' => 'fa-users',                   'title' => 'Group/Centre Activities',       'desc' => 'Assistance to access and participate in group-based community, social, and recreational activities.', 'slug' => 'group-centre-activities' ),
);
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
                <?php foreach ( $services as $service ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' . $service['slug'] . '/' ) ); ?>" class="svc-card svc-card-link">
                        <div class="svc-icon-wrap">
                            <i class="fa-solid <?php echo esc_attr( $service['icon'] ); ?>"></i>
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
