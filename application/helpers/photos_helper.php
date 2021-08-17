<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function resizeImg($photo, $now, $width) {
		$CI = &get_instance();
		$configImg['image_library'] = 'gd2';
    	$CI->load->library('image_lib', $configImg);
		
		$configImg['source_image'] = './uploads/'.$now.'/'.$photo;
		$configImg['new_image'] = './uploads/'.$now.'/'.$photo;
		$configImg['create_thumb'] = FALSE;
		$configImg['maintain_ratio'] = TRUE;
		$configImg['width'] = $width;
		$configImg['quality'] = '80%';
		//$config['height'] = *;
		
		$CI->image_lib->initialize($configImg);

		
		if (!$CI->image_lib->resize()){
			return $CI->image_lib->display_errors();
		die();
		} else {
			$CI->image_lib->clear();
			return true;
		}
		
    }

	function resizeThumb($photo, $now, $width) {
		$CI = &get_instance();
    	$CI->load->library('image_lib');
		if (!is_dir('uploads/min/'.$now)) {
			mkdir('./uploads/min/' . $now, 0777, TRUE);
		}
		$configThumb['image_library'] = 'gd2';
		$configThumb['source_image'] = './uploads/'.$now.'/'.$photo;
		$configThumb['new_image'] = './uploads/min/'.$now.'/'.$photo;
		$configThumb['create_thumb'] = TRUE;
		$configThumb['maintain_ratio'] = TRUE;
		$configThumb['width'] = $width;
		$configThumb['quality'] = '90%';
		//$config['height'] = *;
		$CI->image_lib->clear();
		$CI->image_lib->initialize($configThumb);

		if (!$CI->image_lib->resize()){
			return $CI->image_lib->display_errors();
		} else {
			$CI->image_lib->clear();
			return true;
		}
    }

	function watermark($photo, $now) {
		$CI = &get_instance();
    	$CI->load->library('image_lib');
    	$watermarkLogo = $CI->back_m->get_one('settings', 1);
		
		$configWatermark['image_library'] = 'gd2';
	    $configWatermark['source_image'] = './uploads/'.$now.'/'.$photo;
		$configWatermark['wm_overlay_path'] = './uploads/'.$watermarkLogo->logo;
		$configWatermark['wm_type'] = 'overlay';
		$configWatermark['wm_opacity'] = '80';
		$configWatermark['quality'] = '100%';
		$configWatermark['wm_vrt_alignment'] = 'bottom';
		$configWatermark['wm_hor_alignment'] = 'right';
		$configWatermark['wm_x_transp'] = '0';
		$configWatermark['wm_padding'] = '-10';

		$CI->image_lib->clear();
		$CI->image_lib->initialize($configWatermark);

		if (!$CI->image_lib->watermark()){
			return $CI->image_lib->display_errors();
		} else {
			$CI->image_lib->clear();
			return true;
		}
    }

	function setSize($photo, $now, $size) {
		$CI = &get_instance();
    	$CI->load->library('image_lib');
		$configImg['image_library'] = 'gd2';
		$configImg['source_image'] = './uploads/'.$now.'/'.$photo;
		$configImg['create_thumb'] = FALSE;
		$configImg['maintain_ratio'] = TRUE;
		$configImg['width'] = $size;
		$configImg['height'] = $size;
		$configImg['quality'] = '80%';

		$CI->image_lib->clear();
		$CI->image_lib->initialize($configImg);

		if (!$CI->image_lib->resize()){
			return $CI->image_lib->display_errors();
		} else {
			$CI->image_lib->clear();
			return true;
		}
    }
