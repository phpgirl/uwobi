<?php

function studio_form_system_theme_settings_alter(&$form, $form_state) {

  $theme_path = drupal_get_path('theme', 'studio');
  $form['settings'] = array(
      '#type' => 'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
	  '#attached' => array(
					'css' => array(drupal_get_path('theme', 'studio') . '/css/drupalet_base/admin.css'),
					'js' => array(
						drupal_get_path('theme', 'studio') . '/js/drupalet_admin/admin.js',
					),
			),
  );

  $form['settings']['general_setting'] = array(
      '#type' => 'fieldset',
      '#title' => t('General Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['general_setting']['general_setting_tracking_code'] = array(
      '#type' => 'textarea',
      '#title' => t('Tracking Code'),
      '#default_value' => theme_get_setting('general_setting_tracking_code', 'studio'),
  );

  $form['settings']['general_setting']['home_style'] = array(

      '#title' => t('Home style'),

      '#type' => 'select',

      '#options' => array(
        'other' => t('Default'),
        'image' => t('Background image'),
        'video' => t('Background video'),
        'bgmoving' => t('Background moving'),
        ),

      '#default_value' => theme_get_setting('home_style', 'studio'),

  );

  $form['settings']['general_setting']['title_style'] = array(

      '#title' => t('Home title style'),

      '#type' => 'select',

      '#options' => array(
        'default' => t('Default title home'),
        'center' => t('Title center home'),
        ),

      '#default_value' => theme_get_setting('title_style', 'studio'),

  );

  $form['settings']['general_setting']['path_video'] = array(

      '#title' => t('Theme video background folder'),

      '#type' => 'textfield',

      '#default_value' => theme_get_setting('path_video', 'studio'),

  );

  $form['settings']['general_setting']['video_name'] = array(

      '#title' => t('Video file name'),

      '#type' => 'textfield',

      '#default_value' => theme_get_setting('video_name', 'studio'),

  );


   $form['settings']['header'] = array(
      '#type' => 'fieldset',
      '#title' => t('Header settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

   $form['settings']['header']['header_style'] = array(

      '#title' => t('Header style'),

      '#type' => 'select',

      '#options' => array(
        'header1' => t('Default header'),
        'header2' => t('Transparent header'),
        'header3' => t('Social header'),
        'header4' => t('Slideshow header')
        ),

      '#default_value' => theme_get_setting('header_style', 'studio'),

  );

   $form['settings']['header']['contact_header'] = array(

      '#title' => t('Contact header for Social Header'),

      '#type' => 'textarea',

      '#default_value' => theme_get_setting('contact_header', 'studio'),

  );


   $form['settings']['blogs'] = array(
      '#type' => 'fieldset',
      '#title' => t('Blogs settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['blogs']['blog_style'] = array(

      '#title' => t('Blog style'),

      '#type' => 'select',

      '#options' => array(
        'fullwidth' => t('Fullwidth'),
        'sidebarleft' => t('Sidebar left'),
        'sidebarright' => t('Sidebar right'),
        ),

      '#default_value' => theme_get_setting('blog_style', 'studio'),

  );

  $form['settings']['footer'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['footer']['footer_style'] = array(

      '#title' => t('Footer style'),

      '#type' => 'select',

      '#options' => array(
        'footer1' => t('Footer 1'),
        'footer2' => t('Footer 2'),
        'footer3' => t('Footer 3')
        ),

      '#default_value' => theme_get_setting('footer_style', 'studio'),

  );

  $form['settings']['footer']['footer_copyright_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Footer copyright message'),
      '#default_value' => theme_get_setting('footer_copyright_message', 'studio'),
  );


	$form['settings']['custom_css'] = array(
		  '#type' => 'fieldset',
		  '#title' => t('Custom CSS'),
		  '#collapsible' => TRUE,
		  '#collapsed' => FALSE,
	  );

	$form['settings']['custom_css']['custom_css'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Custom CSS'),
		  '#default_value' => theme_get_setting('custom_css', 'studio'),
		  '#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	  );

  $form['settings']['skin'] = array(

        '#type' => 'fieldset',

        '#title' => t('Switcher Style'),

        '#collapsible' => TRUE,

        '#collapsed' => FALSE,

    );


  //Disable Switcher style;

  $form['settings']['skin']['studio_disable_switch'] = array(

      '#title' => t('Switcher style'),

      '#type' => 'select',

      '#options' => array('on' => t('ON'), 'off' => t('OFF')),

      '#default_value' => theme_get_setting('studio_disable_switch', 'studio'),

  );

  $form['settings']['skin']['built_in_skins'] = array(
    '#type' => 'radios',
    '#title' => t('COLOR SCHEMES'),
    '#options' => array(
        'orange-light/orange-light.css' => t('Default'),
        'blue/blue.css' => t('Blue skin'),
        'bone/bone.css' => t('Bone skin'),
        'brown/brown.css' => t('Brown skin'),
        'cyan/cyan.css' => t('Cyan skin'),
        'green/green.css' => t('Green skin'),
        'orange/orange.css' => t('Orange skin'),
        'purple/purple.css' => t('Purple skin'),
        'red/red.css' => t('Red skin'),
        'yellow/yellow.css' => t('Yellow skin'),
    ),

    '#default_value' => theme_get_setting('built_in_skins','studio')
  );

  $form['settings']['skin']['color_style'] = array(

      '#title' => t('COLOR STYLE'),

      '#type' => 'select',

      '#options' => array(
      'color-default' => t('Default'),
      'color-dark' => t('Dark'),
      'color-light' => t('Light'),
      ),
      '#default_value' => theme_get_setting('color_style', 'studio'),

  );

}