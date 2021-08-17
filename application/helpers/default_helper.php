<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function loadDefaultData() {
    $CI = &get_instance();
	$data['mails'] = $CI->back_m->get_all('mails');
	$data['user'] = $CI->back_m->get_one('users', $_SESSION['id']);
	$data['media'] = $CI->back_m->get_all('media');
	$data['settings'] = $CI->back_m->get_one('settings', 1);
	$data['contact'] = $CI->back_m->get_one('contact_settings', 1);
	$data['api_gallery'] = apiGalleryRows();
	$data['title'] = title($CI->uri->segment(2));
	$data['page_link'] = page_link($CI->uri->segment(2));

    return $data;
}

function loadDefaultDataFront() {
    $CI = &get_instance();
	$data['settings'] = $CI->back_m->get_one('settings', 1);
	$data['subpages'] = $CI->back_m->get_all('subpages');
	$data['footer_links'] = $CI->back_m->get_with_limit('subpages',4);
	$data['current_page'] = $CI->back_m->get_subpage($CI->uri->segment(1));
	$data['contact'] = $CI->back_m->get_one('contact_settings', 1);
    return $data;
}

function assets(){
	return base_url().'assets/front/';
}


function images(){
	return base_url().'uploads/';
}