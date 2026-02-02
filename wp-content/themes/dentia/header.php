<?php
/**
 * @package Bravis-Themes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="pxl-wapper" class="pxl-wapper">
        <?php
        dentia()->page->get_site_loader();
        dentia()->header->getHeader();
        dentia()->page->get_page_title();
        ?>
        <div id="pxl-main">