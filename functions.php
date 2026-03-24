<?php
/**
 * NeedsCare Theme Functions
 *
 * @package NeedsCare
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'NEEDSCARE_VERSION', '1.0.5' );
define( 'NEEDSCARE_DIR', get_template_directory() );
define( 'NEEDSCARE_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function needscare_setup() {
    // Add title tag support
    add_theme_support( 'title-tag' );

    // Add featured image support
    add_theme_support( 'post-thumbnails' );

    // Custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // HTML5 markup support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'needscare' ),
        'footer'    => __( 'Footer Menu', 'needscare' ),
    ) );

    // Selective refresh for widgets & menus in Customizer
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add image sizes
    add_image_size( 'needscare-hero', 1920, 800, true );
    add_image_size( 'needscare-service', 600, 400, true );

    // Wide alignment support (Gutenberg + Elementor)
    add_theme_support( 'align-wide' );

    // Responsive embeds
    add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'needscare_setup' );

/**
 * Elementor Theme Support
 */
function needscare_elementor_support() {
    // Register Elementor Pro theme locations
    if ( function_exists( 'elementor_theme_do_location' ) ) {
        add_theme_support( 'elementor-pro' );
    }
}
add_action( 'after_setup_theme', 'needscare_elementor_support', 20 );

/**
 * Register Elementor Pro header/footer locations
 */
function needscare_register_elementor_locations( $elementor_theme_manager ) {
    if ( is_object( $elementor_theme_manager ) && method_exists( $elementor_theme_manager, 'register_all_core_location' ) ) {
        $elementor_theme_manager->register_all_core_location();
    }
}
add_action( 'elementor/theme/register_locations', 'needscare_register_elementor_locations' );

/**
 * Check if current page is built with Elementor
 */
function needscare_is_elementor_page() {
    if ( ! class_exists( '\Elementor\Plugin' ) ) {
        return false;
    }
    $plugin = \Elementor\Plugin::$instance;
    if ( ! $plugin || empty( $plugin->documents ) ) {
        return false;
    }
    $post_id = (int) get_the_ID();
    if ( ! $post_id ) {
        $post_id = (int) get_queried_object_id();
    }
    if ( ! $post_id ) {
        return false;
    }
    $document = $plugin->documents->get( $post_id );
    return $document && $document->is_built_with_elementor();
}

/**
 * Enqueue Styles & Scripts
 */
function needscare_scripts() {
    // Font Awesome 6 (local)
    wp_enqueue_style(
        'needscare-font-awesome',
        NEEDSCARE_URI . '/assets/fontawesome/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Google Fonts — Premium Typography Stack
    wp_enqueue_style(
        'needscare-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap',
        array(),
        null
    );

    // Theme main stylesheet
    wp_enqueue_style(
        'needscare-theme',
        NEEDSCARE_URI . '/assets/css/theme.css',
        array(),
        NEEDSCARE_VERSION
    );

    // WordPress default stylesheet (for admin bar compatibility)
    wp_enqueue_style( 'needscare-style', get_stylesheet_uri(), array(), NEEDSCARE_VERSION );

    // Theme scripts
    wp_enqueue_script(
        'needscare-theme',
        NEEDSCARE_URI . '/assets/js/theme.js',
        array(),
        NEEDSCARE_VERSION,
        true
    );

    // OpenDyslexic font (for accessibility toolbar)
    wp_enqueue_style(
        'needscare-opendyslexic',
        'https://fonts.cdnfonts.com/css/opendyslexic',
        array(),
        null
    );

    // Accessibility stylesheet
    wp_enqueue_style(
        'needscare-accessibility',
        NEEDSCARE_URI . '/assets/css/accessibility.css',
        array( 'needscare-theme' ),
        NEEDSCARE_VERSION
    );

    // Accessibility toolbar script
    wp_enqueue_script(
        'needscare-accessibility',
        NEEDSCARE_URI . '/assets/js/accessibility.js',
        array(),
        NEEDSCARE_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'needscare_scripts' );

/**
 * Register Widget Areas
 */
function needscare_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Col 1', 'needscare' ),
        'id'            => 'footer-1',
        'description'   => __( 'Footer column 1 widgets.', 'needscare' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Col 2', 'needscare' ),
        'id'            => 'footer-2',
        'description'   => __( 'Footer column 2 widgets.', 'needscare' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'needscare_widgets_init' );

/**
 * Custom Walker for Navigation Menu with Dropdown Support
 */
class NeedsCare_Walker_Nav extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="dropdown-menu">';
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $item_classes = is_array( $item->classes ) ? $item->classes : array();
        $classes      = implode( ' ', $item_classes );
        $has_children = in_array( 'menu-item-has-children', $item_classes, true );

        if ( $depth === 0 && $has_children ) {
            $output .= '<li class="dropdown ' . esc_attr( $classes ) . '">';
            $output .= '<a href="' . esc_url( $item->url ) . '" class="nav-link">' . esc_html( $item->title ) . '<span class="nav-link-caret" aria-hidden="true"> &#9662;</span></a>';
        } elseif ( $depth === 0 ) {
            $active = $item->current ? ' active' : '';
            $output .= '<li class="' . esc_attr( $classes ) . '">';
            $output .= '<a href="' . esc_url( $item->url ) . '" class="nav-link' . $active . '">' . esc_html( $item->title ) . '</a>';
        } else {
            $output .= '<li>';
            $output .= '<a href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
        }
    }
}

/**
 * Customizer Settings
 */
function needscare_customizer( $wp_customize ) {
    // Hero Section
    $wp_customize->add_section( 'needscare_hero', array(
        'title'    => __( 'Hero Section', 'needscare' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'hero_title', array(
        'default'           => 'Empowering Lives With Compassionate Care',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_title', array(
        'label'   => __( 'Hero Title', 'needscare' ),
        'section' => 'needscare_hero',
        'type'    => 'text',
    ) );

    // Number of carousel slides
    $wp_customize->add_setting( 'hero_slide_count', array(
        'default'           => '3',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'hero_slide_count', array(
        'label'   => __( 'Number of Slides', 'needscare' ),
        'section' => 'needscare_hero',
        'type'    => 'select',
        'choices' => array(
            '1' => '1 Slide',
            '2' => '2 Slides',
            '3' => '3 Slides',
            '4' => '4 Slides',
            '5' => '5 Slides',
        ),
    ) );

    // Individual slide images (1–5)
    for ( $i = 1; $i <= 5; $i++ ) {
        $wp_customize->add_setting( "hero_slide_{$i}_image", array(
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "hero_slide_{$i}_image", array(
            'label'   => sprintf( __( 'Slide %d — Background Image', 'needscare' ), $i ),
            'section' => 'needscare_hero',
        ) ) );
    }

    // Footer Section
    $wp_customize->add_section( 'needscare_footer', array(
        'title'    => __( 'Footer Settings', 'needscare' ),
        'priority' => 33,
    ) );

    $wp_customize->add_setting( 'footer_logo', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
        'label'       => __( 'Footer Logo', 'needscare' ),
        'description' => __( 'Upload a logo for the footer. If empty, the site name text will be shown.', 'needscare' ),
        'section'     => 'needscare_footer',
    ) ) );

    // Testimonials Section
    $wp_customize->add_section( 'needscare_testimonials', array(
        'title'       => __( 'Testimonials', 'needscare' ),
        'priority'    => 34,
        'description' => __( 'Manage the testimonials shown on the homepage carousel.', 'needscare' ),
    ) );

    // Number of testimonials
    $wp_customize->add_setting( 'testimonial_count', array(
        'default'           => '5',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'testimonial_count', array(
        'label'   => __( 'Number of Testimonials', 'needscare' ),
        'section' => 'needscare_testimonials',
        'type'    => 'select',
        'choices' => array(
            '1' => '1', '2' => '2', '3' => '3', '4' => '4',
            '5' => '5', '6' => '6', '7' => '7', '8' => '8',
        ),
    ) );

    // Default testimonial data
    $testimonial_defaults = array(
        1 => array( 'name' => 'Susan M.',  'role' => 'NDIS Participant',    'quote' => 'NeedsCare empowers me to live life on my terms with exceptional therapeutic and community nursing support. The team truly understands what independence means.', 'rating' => '5' ),
        2 => array( 'name' => 'John D.',   'role' => 'Family Member',       'quote' => 'NeedsCare has been life-changing, providing compassionate and professional support that has helped my brother gain independence and confidence in daily life.', 'rating' => '5' ),
        3 => array( 'name' => 'Liza K.',   'role' => 'Family Carer',        'quote' => "The team at NeedsCare is reliable and dedicated, improving my father's quality of life with personalized and attentive care every single day.", 'rating' => '5' ),
        4 => array( 'name' => 'Marcus T.', 'role' => 'NDIS Participant',    'quote' => 'From community access to travel support, NeedsCare has opened doors I never thought possible. They genuinely care about my goals and wellbeing.', 'rating' => '5' ),
        5 => array( 'name' => 'Priya S.',  'role' => 'Support Coordinator', 'quote' => "Working alongside NeedsCare has been seamless. Their professionalism and person-centred approach make them one of the best providers I've partnered with.", 'rating' => '5' ),
    );

    // Per-testimonial fields (1–8)
    for ( $i = 1; $i <= 8; $i++ ) {
        $defaults = isset( $testimonial_defaults[ $i ] ) ? $testimonial_defaults[ $i ] : array( 'name' => '', 'role' => '', 'quote' => '', 'rating' => '5' );

        // Separator heading
        $wp_customize->add_setting( "testimonial_{$i}_heading", array(
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( "testimonial_{$i}_heading", array(
            'label'       => sprintf( __( '— Testimonial %d —', 'needscare' ), $i ),
            'section'     => 'needscare_testimonials',
            'type'        => 'hidden',
            'description' => sprintf( '<strong style="font-size:14px;display:block;padding:8px 0 4px;border-top:1px solid #ddd;margin-top:10px;">Testimonial %d</strong>', $i ),
        ) );

        // Name
        $wp_customize->add_setting( "testimonial_{$i}_name", array(
            'default'           => $defaults['name'],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( "testimonial_{$i}_name", array(
            'label'   => sprintf( __( 'Name %d', 'needscare' ), $i ),
            'section' => 'needscare_testimonials',
            'type'    => 'text',
        ) );

        // Role
        $wp_customize->add_setting( "testimonial_{$i}_role", array(
            'default'           => $defaults['role'],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( "testimonial_{$i}_role", array(
            'label'   => sprintf( __( 'Role %d', 'needscare' ), $i ),
            'section' => 'needscare_testimonials',
            'type'    => 'text',
        ) );

        // Quote
        $wp_customize->add_setting( "testimonial_{$i}_quote", array(
            'default'           => $defaults['quote'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ) );
        $wp_customize->add_control( "testimonial_{$i}_quote", array(
            'label'   => sprintf( __( 'Quote %d', 'needscare' ), $i ),
            'section' => 'needscare_testimonials',
            'type'    => 'textarea',
        ) );

        // Rating
        $wp_customize->add_setting( "testimonial_{$i}_rating", array(
            'default'           => $defaults['rating'],
            'sanitize_callback' => 'absint',
        ) );
        $wp_customize->add_control( "testimonial_{$i}_rating", array(
            'label'   => sprintf( __( 'Rating %d', 'needscare' ), $i ),
            'section' => 'needscare_testimonials',
            'type'    => 'select',
            'choices' => array( '1' => '1 Star', '2' => '2 Stars', '3' => '3 Stars', '4' => '4 Stars', '5' => '5 Stars' ),
        ) );
    }

    // Contact Info
    $wp_customize->add_section( 'needscare_contact', array(
        'title'    => __( 'Contact Info', 'needscare' ),
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'contact_phone', array(
        'default'           => '0468 370 705',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contact_phone', array(
        'label'   => __( 'Phone Number', 'needscare' ),
        'section' => 'needscare_contact',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'contact_email', array(
        'default'           => 'info@needscare.com.au',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'contact_email', array(
        'label'   => __( 'Email Address', 'needscare' ),
        'section' => 'needscare_contact',
        'type'    => 'email',
    ) );

    $wp_customize->add_setting( 'contact_address', array(
        'default'           => '123 Care Avenue, Donnybrook VIC 3064',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contact_address', array(
        'label'   => __( 'Address', 'needscare' ),
        'section' => 'needscare_contact',
        'type'    => 'text',
    ) );
}
add_action( 'customize_register', 'needscare_customizer' );

/**
 * Register Testimonials Custom Post Type
 */
function needscare_register_testimonials_cpt() {
    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name', 'needscare' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name', 'needscare' ),
        'menu_name'          => _x( 'Testimonials', 'admin menu', 'needscare' ),
        'add_new'            => _x( 'Add New', 'testimonial', 'needscare' ),
        'add_new_item'       => __( 'Add New Testimonial', 'needscare' ),
        'edit_item'          => __( 'Edit Testimonial', 'needscare' ),
        'new_item'           => __( 'New Testimonial', 'needscare' ),
        'view_item'          => __( 'View Testimonial', 'needscare' ),
        'search_items'       => __( 'Search Testimonials', 'needscare' ),
        'not_found'          => __( 'No testimonials found', 'needscare' ),
        'not_found_in_trash' => __( 'No testimonials found in Trash', 'needscare' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonial' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-testimonial',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );

    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'needscare_register_testimonials_cpt' );

/**
 * Register FAQ Custom Post Type
 */
function needscare_register_faq_cpt() {
    $labels = array(
        'name'               => _x( 'FAQs', 'post type general name', 'needscare' ),
        'singular_name'      => _x( 'FAQ', 'post type singular name', 'needscare' ),
        'menu_name'          => _x( 'FAQs', 'admin menu', 'needscare' ),
        'add_new'            => _x( 'Add New', 'faq', 'needscare' ),
        'add_new_item'       => __( 'Add New FAQ', 'needscare' ),
        'edit_item'          => __( 'Edit FAQ', 'needscare' ),
        'new_item'           => __( 'New FAQ', 'needscare' ),
        'view_item'          => __( 'View FAQ', 'needscare' ),
        'search_items'       => __( 'Search FAQs', 'needscare' ),
        'not_found'          => __( 'No FAQs found', 'needscare' ),
        'not_found_in_trash' => __( 'No FAQs found in Trash', 'needscare' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faq' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-editor-help',
        'supports'           => array( 'title', 'editor' ),
    );

    register_post_type( 'faq', $args );
}
add_action( 'init', 'needscare_register_faq_cpt' );

/**
 * Add Meta Boxes for Testimonials
 */
function needscare_testimonial_meta_boxes() {
    add_meta_box(
        'testimonial_details',
        __( 'Testimonial Details', 'needscare' ),
        'needscare_testimonial_details_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'needscare_testimonial_meta_boxes' );

function needscare_testimonial_details_callback( $post ) {
    wp_nonce_field( 'testimonial_meta_box', 'testimonial_meta_box_nonce' );

    $role   = get_post_meta( $post->ID, '_testimonial_role', true );
    $rating = get_post_meta( $post->ID, '_testimonial_rating', true );
    if ( ! $rating ) {
        $rating = 5;
    }

    echo '<p><label for="testimonial_role">' . __( 'Role/Designation', 'needscare' ) . '</label><br />';
    echo '<input type="text" id="testimonial_role" name="testimonial_role" value="' . esc_attr( $role ) . '" size="25" style="width:100%;" /></p>';

    echo '<p><label for="testimonial_rating">' . __( 'Rating (1-5)', 'needscare' ) . '</label><br />';
    echo '<select id="testimonial_rating" name="testimonial_rating" style="width:100%;">';
    for ( $i = 1; $i <= 5; $i++ ) {
        echo '<option value="' . $i . '"' . selected( $rating, $i, false ) . '>' . $i . ' Star' . ( $i > 1 ? 's' : '' ) . '</option>';
    }
    echo '</select></p>';
}

/**
 * Save Testimonial Meta
 */
function needscare_save_testimonial_meta( $post_id ) {
    if ( ! isset( $_POST['testimonial_meta_box_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['testimonial_meta_box_nonce'], 'testimonial_meta_box' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['testimonial_role'] ) ) {
        update_post_meta( $post_id, '_testimonial_role', sanitize_text_field( $_POST['testimonial_role'] ) );
    }
    if ( isset( $_POST['testimonial_rating'] ) ) {
        update_post_meta( $post_id, '_testimonial_rating', absint( $_POST['testimonial_rating'] ) );
    }
}
add_action( 'save_post', 'needscare_save_testimonial_meta' );

/**
 * Helper: Get theme mod with fallback
 *
 * Ensures null is never returned (PHP 8.1+ deprecates null passed to string functions in core and templates).
 */
function needscare_get( $key, $default = '' ) {
    $value = get_theme_mod( $key, $default );
    return null === $value ? $default : $value;
}

/**
 * Digits-only number for WhatsApp wa.me from Customizer contact_phone (default 0468 370 705 → 61468370705).
 *
 * @return string
 */
function needscare_whatsapp_phone_digits() {
    $raw    = needscare_get( 'contact_phone', '0468 370 705' );
    $digits = preg_replace( '/\D+/', '', (string) $raw );
    if ( '' === $digits ) {
        return '61468370705';
    }
    if ( 10 === strlen( $digits ) && '0' === $digits[0] ) {
        return '61' . substr( $digits, 1 );
    }
    if ( 9 === strlen( $digits ) && '4' === $digits[0] ) {
        return '61' . $digits;
    }
    if ( strlen( $digits ) >= 2 && '61' === substr( $digits, 0, 2 ) ) {
        return $digits;
    }
    return '61' . $digits;
}

/**
 * WhatsApp click-to-chat URL (opens app or web).
 *
 * @return string
 */
function needscare_whatsapp_url() {
    return 'https://wa.me/' . needscare_whatsapp_phone_digits();
}

/**
 * Recursively remove core/gallery blocks (custom grid renders images separately).
 *
 * @param array $blocks Parsed blocks.
 * @return array
 */
function needscare_strip_gallery_blocks_recursive( $blocks ) {
    $kept = array();
    foreach ( $blocks as $block ) {
        if ( isset( $block['blockName'] ) && 'core/gallery' === $block['blockName'] ) {
            continue;
        }
        if ( ! empty( $block['innerBlocks'] ) ) {
            $block['innerBlocks'] = needscare_strip_gallery_blocks_recursive( $block['innerBlocks'] );
        }
        $kept[] = $block;
    }
    return $kept;
}

/**
 * Page content with Gallery blocks / [gallery] shortcodes removed (for Gallery page intro).
 *
 * @param int $post_id Post ID.
 * @return string Raw post content without galleries.
 */
function needscare_get_page_content_without_gallery( $post_id ) {
    $post = get_post( $post_id );
    if ( ! $post ) {
        return '';
    }
    $raw = $post->post_content;
    if ( function_exists( 'has_blocks' ) && has_blocks( $raw ) ) {
        $blocks = parse_blocks( $raw );
        $blocks = needscare_strip_gallery_blocks_recursive( $blocks );
        $raw    = '';
        foreach ( $blocks as $b ) {
            $raw .= serialize_block( $b );
        }
    } else {
        $raw = preg_replace( '/\[\s*gallery(?:\s[^\]]*)?\s*\]/i', '', $raw );
    }
    return $raw;
}

/**
 * Collect image attachment IDs for the Gallery page template.
 *
 * @param int $post_id Post ID.
 * @return int[] Unique attachment IDs.
 */
function needscare_get_gallery_image_ids( $post_id ) {
    $ids = array();

    $attached = get_posts(
        array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'post_parent'    => $post_id,
            'posts_per_page' => -1,
            'orderby'        => array(
                'menu_order' => 'ASC',
                'ID'         => 'ASC',
            ),
            'post_status'    => 'inherit',
            'fields'         => 'ids',
        )
    );
    $ids = array_merge( $ids, $attached );

    $post = get_post( $post_id );
    if ( $post && function_exists( 'get_post_galleries' ) ) {
        foreach ( get_post_galleries( $post, false ) as $gal ) {
            if ( empty( $gal['ids'] ) ) {
                continue;
            }
            foreach ( explode( ',', $gal['ids'] ) as $id ) {
                $id = absint( $id );
                if ( $id ) {
                    $ids[] = $id;
                }
            }
        }
    }

    if ( $post && function_exists( 'has_blocks' ) && has_blocks( $post->post_content ) ) {
        needscare_collect_gallery_ids_from_blocks( parse_blocks( $post->post_content ), $ids );
    }

    $ids = array_values( array_unique( array_filter( array_map( 'absint', $ids ) ) ) );
    return $ids;
}

/**
 * @param array $blocks Parsed blocks.
 * @param int[] $ids    Collected IDs (by reference).
 */
function needscare_collect_gallery_ids_from_blocks( $blocks, &$ids ) {
    foreach ( $blocks as $block ) {
        if ( ! empty( $block['blockName'] ) && 'core/gallery' === $block['blockName'] ) {
            if ( ! empty( $block['attrs']['ids'] ) && is_array( $block['attrs']['ids'] ) ) {
                foreach ( $block['attrs']['ids'] as $id ) {
                    $id = absint( $id );
                    if ( $id ) {
                        $ids[] = $id;
                    }
                }
            }
            if ( ! empty( $block['innerBlocks'] ) ) {
                foreach ( $block['innerBlocks'] as $inner ) {
                    if ( ! empty( $inner['blockName'] ) && 'core/image' === $inner['blockName'] && ! empty( $inner['attrs']['id'] ) ) {
                        $ids[] = absint( $inner['attrs']['id'] );
                    }
                }
            }
        }
        if ( ! empty( $block['innerBlocks'] ) ) {
            needscare_collect_gallery_ids_from_blocks( $block['innerBlocks'], $ids );
        }
    }
}

/**
 * Permalink for the page using the Gallery template (or /gallery/ if none yet).
 *
 * @return string
 */
function needscare_gallery_permalink() {
    $pages = get_pages(
        array(
            'meta_key'    => '_wp_page_template',
            'meta_value'  => 'page-gallery.php',
            'number'      => 1,
            'post_status' => 'publish',
        )
    );
    if ( ! empty( $pages ) ) {
        return get_permalink( $pages[0]->ID );
    }
    return home_url( '/gallery/' );
}

/**
 * Whether the current view is the Gallery page template.
 *
 * @return bool
 */
function needscare_is_gallery_page() {
    return is_page_template( 'page-gallery.php' );
}

/**
 * Insert Gallery after About Us in primary / footer menus (Appearance → Menus).
 *
 * @param WP_Post[] $items Sorted menu items.
 * @param object    $args  wp_nav_menu() args.
 * @return WP_Post[]|object[]
 */
function needscare_inject_gallery_menu_item( $items, $args ) {
    if ( empty( $args->theme_location ) ) {
        return $items;
    }
    if ( 'primary' !== $args->theme_location && 'footer' !== $args->theme_location ) {
        return $items;
    }

    $url = needscare_gallery_permalink();
    foreach ( $items as $item ) {
        if ( ! empty( $item->url ) && untrailingslashit( $item->url ) === untrailingslashit( $url ) ) {
            return $items;
        }
    }

    $inject_after = -1;
    foreach ( $items as $i => $item ) {
        if ( empty( $item->url ) ) {
            continue;
        }
        $path = (string) wp_parse_url( $item->url, PHP_URL_PATH );
        if ( $path && preg_match( '#/about-us/?$#i', $path ) ) {
            $inject_after = $i;
            break;
        }
    }

    $active = needscare_is_gallery_page();
    $g      = new stdClass();
    $g->ID                    = ( 'primary' === $args->theme_location ) ? -90210 : -90211;
    $g->db_id                 = $g->ID;
    $g->menu_item_parent      = 0;
    $g->object                = 'custom';
    $g->type                  = 'custom';
    $g->type_label            = 'Custom';
    $g->title                 = __( 'Gallery', 'needscare' );
    $g->url                   = $url;
    $g->target                = '';
    $g->attr_title            = '';
    $g->description           = '';
    $g->classes               = array( 'menu-item', 'menu-item-type-custom', 'menu-item-object-custom' );
    $g->xfn                   = '';
    $g->current               = $active;
    $g->current_item_ancestor = false;
    $g->current_item_parent   = false;
    $g->post_parent           = 0;
    if ( $active ) {
        $g->classes[] = 'current-menu-item';
        $g->classes[] = 'current_page_item';
    }

    if ( $inject_after >= 0 ) {
        array_splice( $items, $inject_after + 1, 0, array( $g ) );
    } else {
        $items[] = $g;
    }

    return $items;
}
add_filter( 'wp_nav_menu_objects', 'needscare_inject_gallery_menu_item', 10, 2 );
