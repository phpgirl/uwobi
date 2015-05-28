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
<?php
	if (isset($_GET['style'])) {
		$blog_style = $_GET['style'];
	} elseif (isset($node->field_sidebar_style['und'][0]['value'])) {
		$blog_style = $node->field_sidebar_style['und'][0]['value'];
	} else {
		$blog_style = theme_get_setting('blog_style', 'studio');
		if(empty($blog_style))
		$blog_style = 'sidebarright';
	}
?>
<?php  if($page['content']):?>
<section class="content color color-light paddings blogs">
	<div class="container">
		<div class="row">
		<?php
			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
			print render($tabs);
			endif;
			print $messages;
		?>
		<?php if ($blog_style == 'fullwidth') { ?>
			<!--Blog List-->
			<div class="col-md-12">
			<?php print render($page['content']) ?>
			</div>
            <!--Blog List-->
		<?php } elseif ($blog_style == 'sidebarright') {?>
			<!--Blog List-->
	        <div class="col-md-9">
			<?php print render($page['content']) ?>
			</div>
            <!--Blog List-->
			<?php  if($page['sidebar']):?>
			<aside class="col-md-3">
			<?php print render($page['sidebar']) ?>
			</aside>
			<?php endif; ?>
		<?php } else {?>
			<?php  if($page['sidebar']):?>
			<aside class="col-md-3">
			<?php print render($page['sidebar']) ?>
			</aside>
			<?php endif; ?>
			<!--Blog List-->
	        <div class="col-md-9">
			<?php print render($page['content']) ?>
			</div>
            <!--Blog List-->
		<?php } ?>
		</div>
	</div>
	<!-- pattern_bottom -->
    <div class="pattern_bottom pattern-bottom-light"></div>
    <!-- end pattern_bottom -->
</section>
<?php endif; ?>

<?php if ($page['content_section']): ?>
<?php print render($page['content_section']) ;?>
<?php endif; ?>

<?php require_once(drupal_get_path('theme','studio').'/tpl/footer.tpl.php'); ?>