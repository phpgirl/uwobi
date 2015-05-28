<?php
global $base_url;

function studio_preprocess_html(&$variables) {
	drupal_add_js('http://www.google.com/jsapi', array('type' => 'external', 'scope' => 'header'));
}

// Add css skin
$setting_skin = theme_get_setting('built_in_skins', 'studio');
if(!empty($setting_skin)){
	$skin_color = '/css/skins/'.$setting_skin;
}else{
	$skin_color = '/css/skins/orange-light/orange-light.css';
}
$css_skin = array(
	'#tag' => 'link', // The #tag is the html tag - <link />
	'#attributes' => array( // Set up an array of attributes inside the tag
	'href' => $base_url.'/'.path_to_theme().$skin_color,
	'rel' => 'stylesheet',
	'type' => 'text/css',
	'class' => 'skin',
	'media' => 'screen',
	'data-baseurl'=>$base_url.'/'.path_to_theme()
	),
	'#weight' => 1,
);
drupal_add_html_head($css_skin, 'skin');

function studio_form_comment_form_alter(&$form, &$form_state) {
  $form['comment_body']['#after_build'][] = 'studio_customize_comment_form';
}

function studio_customize_comment_form(&$form) {
  $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
  return $form;
}

function studio_preprocess_page(&$vars) {

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}

	//404 page
	$status = drupal_get_http_header("status");
	if($status == "404 Not Found") {
		$vars['theme_hook_suggestions'][] = 'page__404';
	}


	if (isset($vars['node'])) :
		//print $vars['node']->type;
        if($vars['node']->type == 'page'):

            $node = node_load($vars['node']->nid);
            $output = field_view_field('node', $node, 'field_show_page_title', array('label' => 'hidden'));
            $vars['field_show_page_title'] = $output;
			//sidebar
			$output = field_view_field('node', $node, 'field_sidebar', array('label' => 'hidden'));
            $vars['field_sidebar'] = $output;
        endif;
    endif;

}


// Remove superfish css files.
function studio_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);

//	unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}
function studio_js_alter(&$js)
{
   unset($js[drupal_get_path('module', 'commerce_ajax_cart').'/js/commerce_ajax_cart.js']);
}

function studio_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
		$form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['id'] = array("mod-search-searchword");
		//disabled submit button
		//unset($form['actions']['submit']);
		unset($form['search_block_form']['#title']);
		$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
		$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
	}
	if($form_id == 'contact_site_form'){
		$form['mail']['#attributes']['class'] = array("input-contact-form");
		$form['name']['#attributes']['class'] = array("input-contact-form");
		$form['subject']['#attributes']['class'] = array("input-contact-form");
		$form['message']['#attributes']['class'] = array("message-contact-form");
		$form['actions']['submit']['#attributes']['class'] = array('btn btn-success contact-form-button');
	}
	if ($form_id == 'comment_form') {
		$form['comment_filter']['format'] = array(); // nuke wysiwyg from comments
	}

}
function studio_textarea($variables) {
  $element = $variables['element'];
  $element['#attributes']['name'] = $element['#name'];
  $element['#attributes']['id'] = $element['#id'];
  $element['#attributes']['cols'] = $element['#cols'];
  $element['#attributes']['rows'] = $element['#rows'];
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}
function studio_breadcrumb($variables) {
	$crumbs ='';
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs .= '';
		foreach($breadcrumb as $value) {

			$crumbs .= $value.' <span class="divider">/</span> ';
		}
		$crumbs .= '<span class="last">'.drupal_get_title().'</span>';
		return $crumbs;
	}else{
		return NULL;
	}
}
//custom main menu
function studio_menu_tree__main_menu(array $variables) {
	if (preg_match("/\bexpanded\b/i", $variables['tree'])){
	return '<ul class="collapse">'.$variables['tree'].'</ul>';
	} else {
	return '<ul class="drop-down one-column hover-zoom">' . $variables['tree'] . '</ul>';
	}
}


/**Override Menu theme */
function studio_links__system_main_menu(array $variables) {
       $html = "<ul class='menu'>";
    foreach ($variables['links'] as $link) {
        $html .= "<li>".l($link['title'], $link['path'], $link)."</li>";
    }
    $html .= "</ul>";
    return $html;
}
function studio_menu_tree__menu_top_menu($variables) {
	$str = '';
	$str .= '<ul class="sub-menu hidden-xs">';
		$str .= $variables['tree'];
	$str .= '</ul><div class="cl"></div>';

	return $str;
}

function studio_menu_tree__menu_footer_menu($variables) {
	$str = '';
	$str .= '<ul class="footer-menu">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}
function hook_preprocess_page(&$variables) {
	if (arg(0) == 'node' && is_numeric($nid)) {
		if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
			$variables['node_content'] =& $variables['page']['content']['system_main']['nodes'][$nid];
			if (empty($variables['node_content']['field_show_page_title'])) {
			$variables['node_content']['field_show_page_title'] = NULL;
			}
		}
	}
}

function getRelatedPosts($ntype,$nid){
	$nids = db_query("SELECT n.nid, title FROM {node} n WHERE n.status = 1 AND n.type = :type AND n.nid <> :nid ORDER BY RAND() LIMIT 0,6", array(':type' => $ntype, ':nid' => $nid))->fetchCol();
	$nodes = node_load_multiple($nids);
	$return_string = '' ;
	if (!empty($nodes)):
		foreach ($nodes as $node) :
			$field_image = field_get_items('node', $node, 'field_image');
			$return_string .= '<div class="related-post"><figure>';
			$return_string .= '<a href="'.url("node/" . $node->nid).'">';
			$return_string .= theme('image_style', array('style_name' => 'image_112x70', 'path' => $field_image[0]['uri'], 'attributes'=>array('alt'=>$node->title)));
			$return_string .= '</a></figure>';
			$return_string .= '<p class="title"><a href="'.url("node/" . $node->nid).'">';
			$return_string .= $node->title.'</a></p>';
			$return_string .= '<p class="meta">'.format_date($node->created, 'custom', 'd M Y').', '.$node->comment_count.' Comments</p></div>';
		endforeach;
	endif;
	return $return_string.'<div class="riva-insert-menu-here"></div>';
}

function studio_preprocess_node(&$vars) {
	unset($vars['content']['links']['statistics']['#links']['statistics_counter']);
}