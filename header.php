<!doctype html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head();?>
        <!--add js--> 
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />

        <!--add fonts-->  
    </head>
<body <?php body_class(); ?>>
<header class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="<?php echo esc_url(home_url()); ?>" class="navbar-brand">
            <img src="<?php echo esc_url(home_url('wp-content/uploads/2024/02/brownavatar.png')); ?>" width="15%" alt="Header Logo" class="img-fluid mx-auto d-block rounded-circle">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        wp_nav_menu(array(
            'menu'              => 'main',
            'theme_location'    => '',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'navbar-nav mr-auto',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ));
        ?>
    </nav>
</header>