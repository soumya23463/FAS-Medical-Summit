<?php
/**
 * @package Bravis-Themes
 */
?>
		</div><!-- #main -->

		<?php dentia()->footer->getFooter(); ?>
		<?php do_action( 'pxl_anchor_target') ?>
		</div><!-- #wapper -->
		<?php if (class_exists('Bravis_User')) { ?>
			<?php dentia_user_form(); ?>
		<?php } ?>
	<?php wp_footer(); ?>
	</body>
</html>
