<?php
// Enqueue Bootstrap CSS and JS
function enqueue_bootstrap() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

    // Bootstrap JS
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

// Register Bootstrap Navwalker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Register navigation menus
function mytheme_theme_setup() {
    register_nav_menus(array(
        'header' => 'Header menu',
        'footer' => 'Footer menu',
    ));
}

add_action('after_setup_theme', 'mytheme_theme_setup');

// Bootstrap Navigation Menu
function mytheme_bootstrap_navwalker() {
    wp_nav_menu(array(
        'menu'              => 'header', // Change 'header' to the desired menu location
        'theme_location'    => 'header', // Change 'header' to the desired menu location
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
        'menu_class'        => 'navbar-nav ml-auto', // Adjust Bootstrap classes as needed
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker(),
    ));
}

// Custom shortcode to display posts
function display_posts_shortcode($atts) {
    $atts = shortcode_atts(array(
        'posts_per_page' => 5, 
        'category'       => 'article', 
    ), $atts);

    $args = array(
        'posts_per_page' => $atts['posts_per_page'],
        'category_name'  => $atts['category'], // Change 'article' to the desired category
    );

    $posts_query = new WP_Query($args);

    if ($posts_query->have_posts()) {
        $output = '<ul>';
        while ($posts_query->have_posts()) {
            $posts_query->the_post();
            $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
        return $output;
    } else {
        return 'No posts found.';
    }
}

add_shortcode('display_posts', 'display_posts_shortcode');
?>

