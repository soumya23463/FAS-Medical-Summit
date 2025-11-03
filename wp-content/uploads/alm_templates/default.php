<div class="pxl-grid-item col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="pxl-post--inner" data-wow-duration="1.2s">
        <?php if (has_post_thumbnail()): ?>
            <div class="pxl-post--featured">
                <a class="pxl-img-link hover-imge-effect3" href="<?php echo esc_url(get_permalink()); ?>">
                    <?php the_post_thumbnail('large'); ?>
                </a>
            </div>
        <?php endif; ?>
        
        <h4 class="pxl-post--title title-hover-line">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
        </h4>

        <div class="pxl-item-content">
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