<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function slug($str) {
	    $str = mb_strtolower($str,'utf-8');
	    $search = array('ą', 'ć', 'ś', 'ó', 'ż', 'ź', 'ę', 'ł', 'ń',' ', '?', '!', '(', ')', '.', ',', '/');
	    $replace = array('a', 'c', 's', 'o', 'z', 'z', 'e', 'l', 'n','-','','','','','','','','');
	    $str = str_ireplace($search, $replace, strtolower(trim($str)));
	    $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
	    return $str;
    }

        function slug__photo($str) {
	    $str = mb_strtolower($str,'utf-8');
	    $search = array('ą', 'ć', 'ś', 'ó', 'ż', 'ź', 'ę', 'ł', 'ń',' ', '?', '!', '(', ')', ',', '/');
	    $replace = array('a', 'c', 's', 'o', 'z', 'z', 'e', 'l', 'n','-','','','','','','','');
	    $str = str_ireplace($search, $replace, strtolower(trim($str)));
	    return $str;
    }