<?php
/**
 * Template Name: Service Detail Page
 *
 * A reusable template for individual service detail pages.
 * Each service page in WordPress should use this template.
 *
 * @package NeedsCare
 */

get_header();

$service_data = array(
    'assist-life-stage-transition' => array(
        'icon' => '🤝',
        'intro' => 'Support to manage life stages, transitions, and supports to foster independence.',
    ),
    'assist-personal-activities' => array(
        'icon' => '🧑‍🦽',
        'intro' => 'Assistance with daily personal activities to enable people to live as autonomously as possible.',
    ),
    'assist-travel-transport' => array(
        'icon' => '🚗',
        'intro' => 'Assistance with travel and transport arrangements for community, social, or economic participation.',
    ),
    'community-nursing-care' => array(
        'icon' => '🧑‍⚕️',
        'intro' => 'A wide range of nursing support services to help manage daily living activities within the comfort of home.',
    ),
    'daily-tasks-shared-living' => array(
        'icon' => '🏠',
        'intro' => 'Assistance with daily life tasks in a group or shared living arrangement.',
    ),
    'innov-community-participation' => array(
        'icon' => '💡',
        'intro' => 'Innovative community participation focused on building skills for independence and well-being.',
    ),
    'development-life-skills' => array(
        'icon' => '📈',
        'intro' => 'Development of daily living and life skills to increase independence in the community.',
    ),
    'household-tasks' => array(
        'icon' => '🧹',
        'intro' => 'Support staff to assist with household tasks to maintain a clean and safe home environment.',
    ),
    'participate-community' => array(
        'icon' => '🏘️',
        'intro' => 'Support to safely and actively participate in community, social, and civic activities.',
    ),
    'group-centre-activities' => array(
        'icon' => '🎭',
        'intro' => 'Assistance to access and participate in group-based community, social, and recreational activities.',
    ),
);

// Get current page slug
$current_slug = get_post_field( 'post_name', get_post() );
$data = isset( $service_data[ $current_slug ] ) ? $service_data[ $current_slug ] : array( 'icon' => '&#9881;', 'intro' => '' );
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


    <!-- Service Detail Content -->
    <section class="section">
        <div class="container">
            <div class="service-detail-content">
                <h2 class="section-title"><?php the_title(); ?></h2>
                <?php if ( $data['intro'] ) : ?>
                    <p class="service-detail-intro"><?php echo esc_html( $data['intro'] ); ?></p>
                <?php endif; ?>

                <div class="page-content">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>

                <div class="service-detail-cta">
                    <a href="<?php echo esc_url( home_url( '/referral/' ) ); ?>" class="btn btn-primary">MAKE A REFERRAL</a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline">CONTACT US</a>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

</main>

<?php get_footer(); ?>
