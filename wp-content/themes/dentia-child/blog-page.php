<?php
/**
 * Template Name: Blog Page
 *
 * @package Bravis-Themes
 */
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
            // Get 1 random post
            $random_post = get_posts(array(
                'posts_per_page' => 1,
                'orderby'        => 'rand'
            ));

            if ($random_post) {
                $post = $random_post[0];
                $categories = get_the_category($post->ID);
                ?>
                <div class="mb-5" style="margin-top: 7%;">
                    <div class="row g-4 align-items-center">
                        <!-- Image Column -->
                        <div class="col-lg-6 col-md-6">
                            <div class="pxl-post--inner" data-wow-duration="1.2s">
                                <?php if (has_post_thumbnail($post->ID)): ?>
                                    <div class="pxl-post--featured">
                                        <a class="pxl-img-link hover-imge-effect3" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                            <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Content Column -->
                        <div class="col-lg-6 col-md-6">
                            <div class="pxl-post--inner" data-wow-duration="1.2s">
                                <!-- Title -->
                                <h4 class="pxl-post--title title-hover-line blog-post-title">
                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                        <?php echo get_the_title($post->ID); ?>
                                    </a>
                                </h4>

                                <div class="pxl-item-content">
                                    <!-- Excerpt -->
                                    <div class="pxl-text-editor">
                                        <div class="pxl-item--inner">
                                            <p class="blog-post-excerpt mb-0">
                                                <?php
                                                $excerpt = get_the_excerpt($post->ID);
                                                echo wp_trim_words($excerpt, 50,'');
                                                ?>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                        <?php 
                                        $post_tags = get_the_tags();
                                        if ($post_tags) : 
                                            // Pick a random tag instead of first
                                            $random_tag = $post_tags[array_rand($post_tags)];
                                        ?>
                                            <div class="pxl-item--tags pxl-post-list">
                                                <a href="<?php echo esc_url(get_tag_link($random_tag->term_id)); ?>">
                                                    <span class="pxl-icon"><i class="caseicon-tags"></i></span>
                                                    <?php echo esc_html($random_tag->name); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
            }
            ?>

            <!-- Blog Grid -->
            <div id="pxl_post_grid-blog" class="pxl-grid pxl-blog-grid pxl-blog-grid1" style="margin-top: 7%;">
                <?php
                echo do_shortcode('[ajax_load_more id="br_post_grid" post_type="post" posts_per_page="3" scroll="false" transition="fade" button_label="Load More" container_type="div" css_classes="pxl-grid-inner row" post__not_in="' . $random_post[0]->ID . '"]');
                ?>
            </div>

            

        </div>
    </div>
</div>
<?php get_footer();
