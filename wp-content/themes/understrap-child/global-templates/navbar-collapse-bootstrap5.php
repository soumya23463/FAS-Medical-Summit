<?php

/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>


<nav id="main-nav" class="navbar navbar-expand-lg navbar-light bg-light" aria-labelledby="main-nav-label">

    <h2 id="main-nav-label" class="screen-reader-text">
        <?php esc_html_e('Main Navigation', 'understrap'); ?>
    </h2>


    <?php if ('container' === $container) : ?>
    <div class="container-fluid d-flex px-5">
        <?php endif; ?>

        <?php get_template_part('global-templates/navbar-branding'); ?>

        <div class="collapse navbar-collapse justify-content-center align-self-start pt-2" id="navbarNavDropdown">
            <!-- The WordPress Menu goes here -->
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'primary',
                    'container'       => false,
                    'menu_class'      => 'navbar-nav mx-auto',
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu',
                    'depth'           => 2,
                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                )
            );
            ?>
        </div>

        <div class="d-flex align-items-center ml-auto">
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="btn btn-primary rounded ">
                Contact Us
            </a>
            <button class="navbar-toggler mx-4" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <?php if ('container' === $container) : ?>
    </div><!-- .container -->
    <?php endif; ?>

</nav><!-- #main-nav -->