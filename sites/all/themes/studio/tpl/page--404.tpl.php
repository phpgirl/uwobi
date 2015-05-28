<?php require_once(drupal_get_path('theme','studio').'/tpl/header.tpl.php'); ?>

<?php if ($page['content']): ?>
<?php
	if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		print render($tabs);
	endif;
	print $messages;
?>
<?php print render($page['content']) ;?>
<?php endif; ?>
<?php require_once(drupal_get_path('theme','studio').'/tpl/footer.tpl.php'); ?>