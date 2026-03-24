<?php
/**
 * Template Name: Elementor Canvas
 * Template Post Type: page
 *
 * A blank canvas for Elementor — no header, no footer, just the content.
 * Select this from Page Attributes → Template in the editor.
 *
 * @package NeedsCare
 */

if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'elementor-canvas' ); ?>>
<?php wp_body_open(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>

<?php wp_footer(); ?>
</body>
</html>
