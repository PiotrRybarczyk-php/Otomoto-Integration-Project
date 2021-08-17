<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function loadViewsFront($name_page, $data = '') {
    $CI = &get_instance();
    return  $CI->load->view('front/blocks/head', $data, TRUE) . 
            $CI->load->view('front/blocks/header', $data, TRUE) .
            $CI->load->view('front/pages/'.$name_page, $data, TRUE) . 
            $CI->load->view('front/blocks/footer', $data, TRUE);
}

function loadViewsBack($name_page, $data = '') {
    $CI = &get_instance();
    return  $CI->load->view('back/blocks/head', $data, TRUE) . 
            $CI->load->view('back/blocks/header', $data, TRUE) .
            $CI->load->view('back/pages/'.$name_page, $data, TRUE) . 
            $CI->load->view('back/blocks/footer', $data, TRUE);
}

function loadSubViewsBack($name_page, $subview, $data = '') {
    $CI = &get_instance();
    return  $CI->load->view('back/blocks/head', $data, TRUE) . 
            $CI->load->view('back/blocks/header', $data, TRUE) .
            $CI->load->view('back/pages/'.$name_page.'/'.$subview, $data, TRUE) . 
            $CI->load->view('back/blocks/footer', $data, TRUE);
}

function loadLogin($name_page, $data = '') {
    $CI = &get_instance();
    return $CI->load->view('back/login/'.$name_page, $data, TRUE);
}

function renderCart($data = '') {
    $CI = &get_instance();
    return  $CI->load->view('front/elements/cart', $data, TRUE);
}
