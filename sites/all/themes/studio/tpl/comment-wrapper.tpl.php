<?php
	if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
		<?php if ($content['#node']->comment_count > 0){ ?>
		<h2 class="top"><?php print t('More Comments') ?>..</h2>
		<?php } ?>
		<?php print render($content['comments']); ?>
		<!-- Comments end //-->
		<!-- Comment form start //-->
		<h2><?php print t("What's your Opinion?") ?></h2>
		<div class="row top">
            <div class="col-md-12">
		<?php print str_replace('resizable', '', render($content['comment_form'])); ?>
		 	</div>
		</div>

<?php
	}
?>
