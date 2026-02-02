<?php
/**
 * @package Bravis-Themes
 */
?>
</div><!-- #main -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
	crossorigin="anonymous"></script>



<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#schedule_cms">
	Schedule
</button> -->

<!-- Patient Access & Pre-Registration Modal -->
<div class="modal fade" id="schedule_papr" tabindex="-1" aria-labelledby="schedule_paprLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="schedule_paprLabel">
					Request A Free<span style="color: #2a7dba"> Consultation </span>
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode('[contact-form-7 id="e8ddf69" title="Patient Access & Pre-Registration"]'); ?>
			</div>
			<div class="modal-footer d-none">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Charge Capture & Coding Services Modal -->
<div class="modal fade" id="schedule_cccs" tabindex="-1" aria-labelledby="schedule_cccsLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="schedule_cccsLabel">
					Schedule an <span style="color: #2a7dba"> Appointment </span>
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode('[contact-form-7 id="ad82766" title="Charge Capture & Coding Services"]'); ?>
			</div>
			<div class="modal-footer d-none">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Claim Management Services Modal -->
<div class="modal fade" id="schedule_cms" tabindex="-1" aria-labelledby="schedule_cmsLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="schedule_cmsLabel">
					Schedule an <span style="color: #2a7dba"> Appointment </span>
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode('[contact-form-7 id="5516ac1" title="Claim Management Services"]'); ?>
			</div>
			<div class="modal-footer d-none">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Patient Scheduling Services Modal -->
<div class="modal fade" id="schedule_pss" tabindex="-1" aria-labelledby="schedule_pssLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="schedule_pssLabel">
					Schedule an <span style="color: #2a7dba"> Appointment </span>
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode('[contact-form-7 id="77b2d72" title="Patient Scheduling Services"]'); ?>
			</div>
			<div class="modal-footer d-none">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		console.log("Script Loaded");

		// Auto-fill page URL and title in form fields
		console.log('Page URL Script Loaded');

		// Patient Access & Pre-Registration Modal
		document.querySelectorAll('.modal_btn_papr-js').forEach(function (btn) {
			console.log("For forEach");
			if (!btn.hasAttribute('data-bs-toggle')) {
				btn.setAttribute('data-bs-toggle', 'modal');
			}

			if (!btn.hasAttribute('data-bs-target')) {
				btn.setAttribute('data-bs-target', '#schedule_papr');
			}
		});

		// Charge Capture & Coding Services Modal
		document.querySelectorAll('.modal_btn_cccs-js').forEach(function (btn) {
			console.log("For forEach");
			if (!btn.hasAttribute('data-bs-toggle')) {
				btn.setAttribute('data-bs-toggle', 'modal');
			}

			if (!btn.hasAttribute('data-bs-target')) {
				btn.setAttribute('data-bs-target', '#schedule_cccs');
			}
		});

		// Claim Management Services Modal
		document.querySelectorAll('.modal_btn_cms-js').forEach(function (btn) {
			console.log("For forEach");
			if (!btn.hasAttribute('data-bs-toggle')) {
				btn.setAttribute('data-bs-toggle', 'modal');
			}

			if (!btn.hasAttribute('data-bs-target')) {
				btn.setAttribute('data-bs-target', '#schedule_cms');
			}
		});

		// Patient Scheduling Services Modal
		document.querySelectorAll('.modal_btn_pss-js').forEach(function (btn) {
			console.log("For forEach");
			if (!btn.hasAttribute('data-bs-toggle')) {
				btn.setAttribute('data-bs-toggle', 'modal');
			}

			if (!btn.hasAttribute('data-bs-target')) {
				btn.setAttribute('data-bs-target', '#schedule_pss');
			}
		});
	});
</script>

<?php dentia()->footer->getFooter(); ?>
<?php do_action('pxl_anchor_target') ?>
</div><!-- #wapper -->
<?php if (class_exists('Bravis_User')) { ?>
	<?php dentia_user_form(); ?>
<?php } ?>
<?php wp_footer(); ?>
</body>


</html>