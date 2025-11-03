<?php
/**
 * @package Bravis-Themes
 */
get_header();
?>
<div class="container">
    <div class="row">
        <div id="pxl-content-area" class="col-10 offset-1">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content-single', get_post_format() );

                    // Comments Section
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                } ?>
            </main>
        </div>

            <?php
            // Random Posts Section (Not Related)
            $random_posts = get_posts(array(
                'post__not_in'   => array(get_the_ID()),
                'posts_per_page' => 3,
                'orderby'        => 'rand'
            ));

            if ($random_posts) {
                $settings = array(
                    'layout'      => 'post-1',
                    'col_xl'      => '4',
                    'col_lg'      => '4',
                    'col_md'      => '6',
                    'col_sm'      => '12',
                    'col_xs'      => '12',
                    'show_date'   => 'false',
                    'show_author' => 'false',
                    'show_tags'   => 'true',
                    'img_size'    => '1380x877',
                    'pxl_animate' => ''
                );
                ?>
                <div class="pxl-grid pxl-blog-grid pxl-blog-grid1 related-posts-wrapper">
                    <h2 class="related-posts-title">You Might Also Like</h2>
                    <div class="pxl-grid-inner row" data-gutter="15">
                        <?php
                        dentia_get_post_grid($random_posts, $settings);
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
        
    </div>
</div>
<?php get_footer();
