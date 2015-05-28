<!-- pattern_top -->
<div class="pattern_top"></div>
<!-- end pattern_top -->
<!-- content -->

<div class="opacy">
	<div class="container">
		<!-- Services-->
		<div class="services">
		<?php print render($title_prefix); ?>
		<?php if ($header): ?>
			<div class="row">
				<?php print $header; ?>
			</div>
		<?php endif; ?>
		<?php print render($title_suffix); ?>
			<div class="divider_light"></div>
			<div class="paddings-content wow fadeIn animated" data-wow-duration="2.0s">
				<?php if ($attachment_before): ?>
				<?php print $attachment_before; ?>
				<?php endif; ?>

				<?php if ($rows): ?>
				<!--Services Info Boxes-->
		        <div class="services_info">
		        	<div class="border_right"></div>
		        	<div class="row border_services">
					<?php print $rows; ?>
					</div>
					<?php if ($attachment_after): ?>
					<div class="row border_services">
					<?php print $attachment_after; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<!--Services Info Boxes-->
			</div>
		</div>
		<!--Services-->
	</div>
</div>
<!-- end content -->

<!-- pattern_bottom -->
<div class="pattern_bottom"></div>
<!-- end pattern_bottom -->