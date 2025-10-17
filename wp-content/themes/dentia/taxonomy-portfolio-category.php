<?php
/**
 * @package Bravis-Themes
 */
get_header(); ?>
<div class="container">
    <div class="row">
        <div id="pxl-content-area" class="col-12">
            <main id="pxl-content-main">
                <div class="pxl-grid pxl-portfolio-grid pxl-portfolio-grid-layout1 pxl-portfolio-style1 pxl-effect--3d">
                    <div class="pxl-grid-inner row">
                        <?php if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post();
                                get_template_part( 'template-parts/category/portfolio' );
                            }
                            dentia()->page->get_pagination();
                        } else {
                            get_template_part( 'template-parts/content/content', 'none' );
                        } ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<?php get_footer();
