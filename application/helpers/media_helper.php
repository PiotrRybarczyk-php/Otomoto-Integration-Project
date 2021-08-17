<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function addMedia($data = '') {
    $CI = &get_instance();
    $media['name'] = $data['file_name']; 
	$media['raw_name'] = $data['raw_name'];   
	$media['type'] = $data['file_type'];   
	$media['size'] = $data['file_size'];   
	$media['full_path'] = $data['full_path'];   
	$media['file_path'] = $data['file_path']; 
	if($data['file_type'] == 'image/jpeg' || $data['file_type'] == 'image/png' || $data['file_type'] == 'image/svg' ){
		$media['is_photo'] = 1;
	} else $media['is_photo'] = 0; 
	if($CI->back_m->insert('media', $media)){
        return true;
    } else {
        return false;
    }
}

