<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function apiGalleryRows(){
    	$CI =& get_instance();
    	$data = $CI->back_m->get_api_photos();
		$tab = [];
		$i=0;
		$array = [];
		foreach($data as $d){
			$help = explode('/',$d->full_path);
			$date = $help[count($help)-2];
			$name = $help[count($help)-1];
			$help =$date .'/'.$name;
			// $array[$i]
			// echo $help.'<br>';
			$tab['id'] = $d->id;
			$tab['alt'] = '';
			$tab['photo'] = $help;
			array_push($array, $tab);
			$i++;
		}

		return $array;
    }