<?php require_once(drupal_get_path('theme','studio').'/tpl/header.tpl.php'); ?>

<?php if ($page['content']): ?>
<?php
	if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		print render($tabs);
	endif;
	print $messages;
	unset($page['content']['system_main']['default_message']);
?>
<?php print render($page['content']) ;?>
<?php endif; ?>

<?php if ($page['content_section']): ?>
<?php print render($page['content_section']) ;?>
<?php endif; ?>
<?php
if (isset($_GET['title'])) {
	$title_style = $_GET['title'];
} else {
	$title_style = theme_get_setting('title_style', 'studio');
		if(empty($title_style))
		$title_style = 'default';
}
?>
<input type="hidden" id="title-style" value="<?php print $title_style; ?>" />
<?php require_once(drupal_get_path('theme','studio').'/tpl/footer.tpl.php'); ?>