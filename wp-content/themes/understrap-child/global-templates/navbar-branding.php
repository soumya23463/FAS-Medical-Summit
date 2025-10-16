<?php

/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! has_custom_logo()) { ?>

<?php if (is_front_page() && is_home()) : ?>

<h1 class="navbar-brand mb-0" style="padding-left: 48px; padding-top: 26px;">
    <a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
        <?php bloginfo('name'); ?>
    </a>
</h1>

<?php else : ?>

<a class="navbar-brand" style="padding-left: 48px; padding-top: 26px;" rel="home"
    href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
    <?php bloginfo('name'); ?>
</a>

<?php endif; ?>

<?php
} else {
?>
<div class="navbar-brand" style="padding-left: 48px; padding-top: 26px;">
    <?php the_custom_logo(); ?>
</div>
<?php
}