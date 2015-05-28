<!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
	<head>
		<meta charset="utf-8">
		<title><?php print $head_title; ?></title>
		<meta name="viewport" content="width=device-width, minimum-scale=1,  maximum-scale=1">
		<!-- Styles -->
		<?php print $styles; ?><?php print $head; ?>
		<!-- Skins Theme -->
		<?php
		//Tracking code
		$tracking_code = theme_get_setting('general_setting_tracking_code', 'studio');
		print $tracking_code;
		//Custom css
		$custom_css = theme_get_setting('custom_css', 'studio');
		if(!empty($custom_css)):
		?>
		<style type="text/css" media="all">
		<?php print $custom_css;?>
		</style>
		<?php
			endif;
		?>

		<!-- styles for IE -->
		<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="js/css3selectors/selectivizr.js"></script>
		<![endif]-->
	</head>
	<body class="<?php print $classes;?>"  <?php print $attributes;?>>
		<div id="skip-link">
			<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
		</div>
		<?php
		$studio_disable_switch = theme_get_setting('studio_disable_switch', 'studio');
		if(empty($studio_disable_switch))
			$bizz_disable_switch = 'on';
		?>
		<?php if ($studio_disable_switch == 'on') { ?>
		<!-- Theme-options -->
		<div id="theme-options" class="center">
			<div class="title"><?php print t('Theme Options'); ?><span title="Theme Options"><i class="fa fa-cogs fa-spin"></i></span></div>
			<span><?php print t('COLOR SCHEMES'); ?></span>
			<ul id="colorchanger">
				<li><a class="colorbox green" href="?theme=green" title="Green Skin"></a></li>
				<li><a class="colorbox cyan" href="?theme=cyan" title="cyan Skin"></a></li>
				<li><a class="colorbox orange" href="?theme=orange" title="Orange Skin"></a></li>
				<li><a class="colorbox bone" href="?theme=bone" title="bone Skin"></a></li>
				<li><a class="colorbox yellow" href="?theme=yellow" title="yellow Skin"></a></li>
				<li><a class="colorbox red" href="?theme=red" title="Red Skin"></a></li>
				<li><a class="colorbox orange-light" href="?theme=orange-light" title="Orange light Skin"></a></li>
				<li><a class="colorbox purple" href="?theme=purple" title="purple Skin"></a></li>
				<li><a class="colorbox brown" href="?theme=brown" title="brown Skin"></a></li>
				<li><a class="colorbox blue" href="?theme=blue" title="blue Skin"></a></li>
			</ul>
			<span><?php print t('OVERALL COLOR SKIN'); ?></span>
			<div class="note-theme">
				<p><span><?php print t('note'); ?>: </span><?php print t('when you clicked in "Default", you can choose some "color schemes" (top <i class="fa fa-level-up"></i> ) for change the overall color skin.'); ?></p>
			</div>
			<ul id="layout-style">
				<li class="dark"><?php print t('Dark'); ?></li>
				<li class="light"><?php print t('Light'); ?></li>
				<li class="default active"><?php print t('Default'); ?></li>
			</ul>
		</div>
		<!--End Theme-options -->
		<?php } ?>
		<!--Layout Theme Options-->
  		<div id="layout">
		<?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>
		</div>
  		<!--Layout Theme Options-->
  		<?php print $scripts; ?>
  		<?php
		$color_style = theme_get_setting('color_style', 'studio');
		if(empty($color_style))
			$color_style = 'color-default';
		?>
		<input type="hidden" id="color-style" value="<?php print $color_style; ?>">
  	</body>
</html>