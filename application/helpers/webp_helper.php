<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('vendor/autoload.php');

use WebPConvert\WebPConvert;


function isOnWebp()
{
	return  true;
}

function readFiles()
{
	$dateFile = '*';
	$directory = "uploads/" . $dateFile;
	$images = glob($directory . "/*.JPEG");
	foreach (array_reverse($images) as $image) {
		$source = str_replace('application/controllers', '', __DIR__ . '/' . $image);
		$ext = pathinfo($source);
		$fileSize = filesize($source);
		$destination = str_replace($ext['extension'], 'webp', $source);
		if (!file_exists($destination) && $image != 'uploads/2021-01-13/5063-1.jpg' && $fileSize < '3000000') {
			try {
				$this->convertImageToWebP($image);
			} catch (exception $e) {
			}
			break;
		}
	}
}

function convertImageToWebP($photo)
{
	$source =  __DIR__ . '/../../uploads/' . $photo;
	$ext = pathinfo($source);
	$destination = str_replace($ext['extension'], 'webp', $source);
	$options = [];
	WebPConvert::convert($source, $destination, $options);
	$returnArray = [true, str_replace($ext['extension'], 'webp', pathinfo($photo))['basename']];
	return $returnArray;
}

function createWebPField($table, $key_field)
{
	$CI = &get_instance();
	if (!$CI->db->field_exists($key_field, $table)) {
		$CI->base_m->create_column($table, $key_field);
	}
}

function saveWebPToBase($product_id, $table, $key_field, $photo)
{
	createWebPField($table, $key_field);
	$update[$key_field] = $photo;
	$CI = &get_instance();
	$CI->back_m->update('products', $update, $product_id);
}

function imgPhotoChecker($source)
{
	$ext = pathinfo($source);
	$path = str_replace('application/helpers', 'uploads', __DIR__ . '/');
	$destination = $path . str_replace($ext['extension'], 'webp', $source);
	if (file_exists($destination)) {
		return true;
	} else {
		return false;
	}
}