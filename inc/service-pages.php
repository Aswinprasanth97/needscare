<?php
/**
 * NDIS service pages: definitions and optional auto-creation of WordPress pages.
 *
 * @package NeedsCare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/service-page-bodies.php';

/**
 * All NDIS service detail pages (slug => meta). Order is preserved for listings.
 *
 * @return array<string, array{title:string,desc:string,intro:string,body:string}>
 */
function needscare_get_service_definitions() {
    static $cache = null;
    if ( null !== $cache ) {
        return $cache;
    }

    $bodies = needscare_get_service_page_bodies();
    $rows   = array(
        'assist-life-stage-transition'   => array(
            'title' => 'Assist-Life Stage, Transition',
            'desc'  => 'Support to manage life stages, transitions, and supports to foster independence.',
            'intro' => 'Support to manage life stages, transitions, and supports to foster independence.',
        ),
        'assist-personal-activities'   => array(
            'title' => 'Assist-Personal Activities',
            'desc'  => 'Assistance with daily personal activities to enable people to live as autonomously as possible.',
            'intro' => 'Assistance with daily personal activities to enable people to live as autonomously as possible.',
        ),
        'assist-travel-transport'      => array(
            'title' => 'Assist-Travel/Transport',
            'desc'  => 'Assistance with travel and transport arrangements for community, social, or economic participation.',
            'intro' => 'Assistance with travel and transport arrangements for community, social, or economic participation.',
        ),
        'community-nursing-care'        => array(
            'title' => 'Community Nursing Care',
            'desc'  => 'A wide range of nursing support services to help manage daily living activities within the comfort of home.',
            'intro' => 'A wide range of nursing support services to help manage daily living activities within the comfort of home.',
        ),
        'daily-tasks-shared-living'   => array(
            'title' => 'Daily Tasks/Shared Living',
            'desc'  => 'Assistance with daily life tasks in a group or shared living arrangement.',
            'intro' => 'Assistance with daily life tasks in a group or shared living arrangement.',
        ),
        'innov-community-participation' => array(
            'title' => 'Innov Community Participation',
            'desc'  => 'Innovative community participation focused on building skills for independence and well-being.',
            'intro' => 'Innovative community participation focused on building skills for independence and well-being.',
        ),
        'development-life-skills'     => array(
            'title' => 'Development-Life Skills',
            'desc'  => 'Development of daily living and life skills to increase independence in the community.',
            'intro' => 'Development of daily living and life skills to increase independence in the community.',
        ),
        'household-tasks'             => array(
            'title' => 'Household Tasks',
            'desc'  => 'Support staff to assist with household tasks to maintain a clean and safe home environment.',
            'intro' => 'Support staff to assist with household tasks to maintain a clean and safe home environment.',
        ),
        'participate-community'       => array(
            'title' => 'Participate Community',
            'desc'  => 'Support to safely and actively participate in community, social, and civic activities.',
            'intro' => 'Support to safely and actively participate in community, social, and civic activities.',
        ),
        'group-centre-activities'     => array(
            'title' => 'Group/Centre Activities',
            'desc'  => 'Assistance to access and participate in group-based community, social, and recreational activities.',
            'intro' => 'Assistance to access and participate in group-based community, social, and recreational activities.',
        ),
    );

    foreach ( $rows as $slug => &$row ) {
        $row['body'] = isset( $bodies[ $slug ] ) ? trim( $bodies[ $slug ] ) : '';
    }
    unset( $row );

    $cache = $rows;
    return $cache;
}

/**
 * Relative path to bundled default featured image for a service (SVG), or empty if missing.
 *
 * @param string $slug Page slug.
 * @return string e.g. assets/img/services/{slug}.svg
 */
function needscare_get_service_default_featured_rel_path( $slug ) {
    $slug = sanitize_title( (string) $slug );
    if ( '' === $slug ) {
        return '';
    }
    $rel = 'assets/img/services/' . $slug . '.svg';
    if ( file_exists( path_join( NEEDSCARE_DIR, $rel ) ) ) {
        return $rel;
    }
    return '';
}

/**
 * Font Awesome icon class (without fa-solid prefix) per service slug — for cards only.
 *
 * @param string $slug Post slug.
 * @return string
 */
function needscare_get_service_icon_fa( $slug ) {
    $map = array(
        'assist-life-stage-transition'   => 'fa-handshake',
        'assist-personal-activities'    => 'fa-person-walking-with-cane',
        'assist-travel-transport'        => 'fa-car-side',
        'community-nursing-care'         => 'fa-user-nurse',
        'daily-tasks-shared-living'      => 'fa-house-user',
        'innov-community-participation'  => 'fa-lightbulb',
        'development-life-skills'        => 'fa-chart-line',
        'household-tasks'                => 'fa-broom',
        'participate-community'          => 'fa-city',
        'group-centre-activities'        => 'fa-users',
    );
    return isset( $map[ $slug ] ) ? $map[ $slug ] : 'fa-circle-info';
}

/**
 * Create published service pages at root if they do not exist (one-time per slug).
 */
function needscare_seed_service_pages() {
    $created = false;
    foreach ( needscare_get_service_definitions() as $slug => $def ) {
        if ( get_page_by_path( $slug, OBJECT, 'page' ) ) {
            continue;
        }
        $id = wp_insert_post(
            array(
                'post_title'   => $def['title'],
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ),
            true
        );
        if ( $id && ! is_wp_error( $id ) ) {
            $created = true;
        }
    }
    if ( $created ) {
        flush_rewrite_rules( false );
    }
}

add_action( 'after_switch_theme', 'needscare_seed_service_pages' );

/**
 * Create any missing service pages on admin load (helps sites that already had the theme active).
 */
function needscare_ensure_service_pages() {
    if ( ! is_admin() || ! current_user_can( 'manage_options' ) ) {
        return;
    }
    foreach ( needscare_get_service_definitions() as $slug => $def ) {
        if ( ! get_page_by_path( $slug, OBJECT, 'page' ) ) {
            needscare_seed_service_pages();
            return;
        }
    }
}

add_action( 'admin_init', 'needscare_ensure_service_pages', 30 );
