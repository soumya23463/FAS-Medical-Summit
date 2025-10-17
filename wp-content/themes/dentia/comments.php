<?php
/**
 * @package Bravis-Themes
 */

if ( post_password_required() ) {
    return;
    } ?>

    <div id="comments" class="comments-area">

        <?php
        if ( have_comments() ) : ?>
            <div class="comment-list-wrap">

                <h2 class="comments-title">
                    <?php
                        $comment_count = get_comments_number();
                        if ( 1 === intval($comment_count) ) {
                            echo esc_html__( '1 Comment', 'dentia' );
                        } else {
                            echo esc_html__('Comments', 'dentia').' ('.esc_attr( $comment_count ).')';
                        }
                    ?>
                </h2>

                <?php the_comments_navigation(); ?>

                <ul class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'callback'   => 'dentia_comment_list',
                            'max_depth'  => 3
                        ) );
                    ?>
                </ul>

                <?php the_comments_navigation(); ?>
            </div>
            <?php if ( ! comments_open() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dentia' ); ?></p>
            <?php
            endif;

        endif;

    $args = array(
            'id_form'           => 'commentform',
            'id_submit'         => 'submit',
            'title_reply'       => esc_attr__( 'Leave A Comment', 'dentia'),
            'title_reply_to'    => esc_attr__( 'Leave A Comment To ', 'dentia') . '%s',
            'cancel_reply_link' => esc_attr__( 'Cancel Comment', 'dentia'),
            'label_submit'      => esc_attr__( 'Send', 'dentia'),
            'comment_notes_before' => '',
            'fields' => apply_filters( 'comment_form_default_fields', array(

                    'author' =>
                    '<div class="comment-form-author">'.
                    '<div class="comment-title-name">Name*</div>'.
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30" placeholder="'.esc_attr__('', 'dentia').'"/></div>',

                    'email' =>
                    '<div class="comment-form-email">'.
                    '<div class="comment-title-name">Email*</div>'.
                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30" placeholder="'.esc_attr__('', 'dentia').'"/></div>',
            )
            ),
            'comment_field' =>  '<div class="comment-form-comment"><div class="comment-title-name">Message*</div><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_attr__('', 'dentia').'" aria-required="true">' .
            '</textarea></div>',
    );
    comment_form($args); ?>
</div>