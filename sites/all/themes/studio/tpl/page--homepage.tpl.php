<?php
if (isset($node->field_home_style['und'][0]['value']))
	{
		$home_style = $node->field_home_style['und'][0]['value'];
	} else {
		$home_style = theme_get_setting('home_style', 'studio');
		if(empty($home_style))
		$home_style = 'other';
	}
?>
<?php if ($home_style == 'bgmoving') { ?>
<section class="bg-moving bg-moving-1">
	<?php require_once(drupal_get_path('theme','studio').'/tpl/header.tpl.php'); ?>

	<?php
		if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
			print render($tabs);
		endif;
		print $messages;
	?>
	<?php if ($page['content_section']): ?>
	<?php print render($page['content_section']) ;?>
	<?php endif; ?>
</section>
<?php } else { ?>
	<?php require_once(drupal_get_path('theme','studio').'/tpl/header.tpl.php'); ?>

	<?php
		if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
			print render($tabs);
		endif;
		print $messages;
	?>
	<?php if ($page['content_section']): ?>
	<?php print render($page['content_section']) ;?>
	<?php endif; ?>
<?php } ?>
<input type="hidden" id="home-style" value="<?php print $home_style; ?>" />
<?php if ($home_style == 'video') {?>
<input type="hidden" id="path-video" value="<?php print base_path().path_to_theme().theme_get_setting('path_video', 'studio') ?>" />

<input type="hidden" id="video-name" value="<?php print theme_get_setting('video_name', 'studio') ?>" />
<?php } ?>
<?php require_once(drupal_get_path('theme','studio').'/tpl/footer.tpl.php'); ?>