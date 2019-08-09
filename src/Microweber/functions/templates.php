<?php
function template_option_group()
{
    return 'mw-template-' . mw()->template->folder_name();
}

function template_stylesheet()
{
    $template_settings = mw()->template->get_config();
    $stylesheet_settings = false;
    if (isset($template_settings['stylesheet_compiler']) AND isset($template_settings['stylesheet_compiler']['settings'])) {
        $stylesheet_settings = $template_settings['stylesheet_compiler']['settings'];
    }

    if (!$stylesheet_settings) {
        return;
    }

    return '<link href="' . mw()->template->get_stylesheet($template_settings['stylesheet_compiler']['source_file'], $template_settings['stylesheet_compiler']['css_file'], true) . '" id="theme-style" rel="stylesheet" type="text/css" media="all"/>';
}

function template_default_css()
{
    $template_settings = mw()->template->get_config();
    if (isset($template_settings['stylesheet_compiler']) AND isset($template_settings['stylesheet_compiler']['css_file'])) {

    } else {
        return;
    }

    return '<link href="' . template_url() . $template_settings['stylesheet_compiler']['css_file'] . '" id="theme-style" rel="stylesheet" type="text/css" media="all"/>';
}

function template_framework()
{
	
	$css_framework = 'mw-ui';
	
	if(isset(mw()->template->get_config()['framework'])) {
		$css_framework = mw()->template->get_config()['framework'];
	}
	
	return $css_framework;
}

function template_row_class()
{
	
	$css_framework = template_framework();
	
	if ($css_framework == 'mw-ui') {
		return 'mw-flex-row';
	}
	
	if ($css_framework == 'bootstrap3' || $css_framework == 'bootstrap4') {
		return 'row';
	}
}

function template_form_row_class()
{
	$css_framework = template_framework();
	
	if ($css_framework == 'mw-ui') {
		return 'mw-flex-row';
	}
	
	if ($css_framework == 'bootstrap3' || $css_framework == 'bootstrap4') {
		return 'form-row';
	}
}

function template_form_group_class()
{
	$css_framework = template_framework();
	
	if ($css_framework == 'mw-ui') {
		return '';
	}
	
	if ($css_framework == 'bootstrap3' || $css_framework == 'bootstrap4') {
		return 'form-group';
	}
}

function template_form_group_label_class()
{
	$css_framework = template_framework();
	
	if ($css_framework == 'mw-ui') {
		return '';
	}
	
	if ($css_framework == 'bootstrap3' || $css_framework == 'bootstrap4') {
		return 'control-label';
	}
}

function template_input_field_class()
{
	$css_framework = template_framework();
	
	if ($css_framework == 'mw-ui') {
		return 'mw-ui-field';
	}
	
	if ($css_framework == 'bootstrap3' || $css_framework == 'bootstrap4') {
		return 'form-control';
	}
}

function field_size_class($field_size = false)
{
	
	$css_framework = template_framework();
	
	// Get default field size
	if (!$field_size) {
		return default_field_size_option();
	}
	
	if ($css_framework == 'mw-ui') {
		return 'mw-flex-col-md-'.$field_size;
	}
	
	if ($css_framework == 'bootstrap3') {
		return 'col-md-'.$field_size;
	}
	
	if ($css_framework == 'bootstrap4') {
		return 'col-'.$field_size . ' ' . 'col-md-'.$field_size;
	}
	
	return $field_size;
}

function default_field_size_option($field = array()) 
{
	$css_framework = template_framework();
	
	if ($css_framework == 'mw-ui') {
		return 'mw-flex-col-md-12 mw-flex-col-sm-12 mw-flex-col-xs-12';
	}
	
	if ($css_framework == 'bootstrap3') {
		return 'col-md-12 col-sm-12 col-xs-12';
	}
	
	if ($css_framework == 'bootstrap4') {
		return 'col-12 col-sm-12 col-xs-12';
	}
	
}