<?php require_once(drupal_get_path('theme','studio').'/tpl/header.tpl.php'); ?>
<!-- Home -->
<section class="bg_image page-title" id="home">
	<!-- main content -->
	<div class="opacy">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php print drupal_get_title(); ?></h2>
				</div>
			</div>
		</div>
	</div>
	<!-- end main content -->
	<!-- pattern_top -->
	<div class="pattern_top pattern-top-light"></div>
	<!-- end pattern_top -->
</section>
<!-- end Home -->

<?php  if($page['content']):?>
<section class="color content color-light paddings">
<?php
	if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		print '<div class="container">';
		print render($tabs);
		print '</div>';
	endif;
	print $messages;
?>
<?php print render($page['content']); ?>
<div class="pattern_bottom pattern-bottom-light"></div>
</section>
<?php endif; ?>

<?php if ($page['content_section']): ?>
<?php print render($page['content_section']) ;?>
<?php endif; ?>

<?php require_once(drupal_get_path('theme','studio').'/tpl/footer.tpl.php'); ?>