<?php
$out = '';
if (!empty($block->block_id)) {
	$id = 'id="'.$block->block_id.'"';
} else {
	$id = '';
}
if($block->region == 'section_home' || $block->region == 'content_section' || $block->region == 'contact'){
	$out .= '<section class="'.$classes.'" '.$id.' '.$attributes.'>';
	if (!empty($block->block_background_class)):
		$out .= '<div class="'.$block->block_background_class.'" ></div>';
	endif;
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h2>'.$block->subject.'</h2>';
	endif;
	$out .= $content;
	$out .= '</section>';

}elseif($block->region == 'content'){
	$out .= '<section class="'.$classes.'" '.$attributes.'>';
	$out .= '<div class="container">';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h1>'.$block->subject.'</h1>';
	endif;
	$out .= $content;
	$out .= '</div></section>';

}elseif($block->region == 'menu_right'){
	$out .= '<li class="'.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<i class="fa '.$block->subject.'"></i>';
	endif;
	$out .= $content;
	$out .= '</li>';

}elseif($block->region == 'sidebar'){
	$out .= '<div class="widget '.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h2 class="top">'.$block->subject.'</h2><div class="divider_dark"></div>';
	endif;
	$out .= $content;
	$out .= '</div>';

}elseif($block->region == 'content_header'){
	$out .= '<div class="title_section '.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= ' <div class="title_section"><h1>'.$block->subject.'<span class="arrow_title"></span></h1>';
		$out .= '<small>'.$block->block_description.'</small></div>';
	endif;
	$out .= '</div>';

}elseif($block->region == 'sidebar_second'){
	$out .= '<aside class="'.$classes.'" '.$attributes.' >';
	$out .= render($title_suffix);
   if ($block->subject)
		$out .= '<h4>'.$block->subject.'</h4>';
	$out .= $content;
	$out .= '</aside>';


}else{
	$out .= '<div id="'.$block_html_id.'" class="'.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';
}
print $out;
?>