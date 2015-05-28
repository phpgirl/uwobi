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
		<?php print $rows; ?>
	</div>
<?php endif; ?>
</div>
<!-- pattern_bottom -->
<div class="pattern_bottom"></div>
<!-- end pattern_bottom -->