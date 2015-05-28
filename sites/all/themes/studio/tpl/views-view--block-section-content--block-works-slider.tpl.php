<?php print render($title_prefix); ?>
<!-- pattern_top -->
<div class="pattern_top"></div>
<!-- end pattern_top -->
<div class="container">
<?php if ($header): ?>
	<div class="row title">
	<?php print $header; ?>
	</div>
<?php endif; ?>
<div class="divider_dark"></div>

<?php if ($rows): ?>
	<div class="row paddings-content">
		<div class="col-md-12">
		<?php print $rows; ?>
		</div>
	</div>
<?php endif; ?>
<div class="divider_dark"></div>
<!-- social -->
<?php if ($footer): ?>
	<?php print $footer; ?>
<?php endif; ?>
</div>
<!-- pattern_bottom -->
<div class="pattern_bottom"></div>
<!-- end pattern_bottom -->