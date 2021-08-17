<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function headers($subpage) {
    $headers = array(
        'media' => array(
            'title' => 'Media', 
            'link' => '#'
        ),
        'mails' => array(
            'title' => 'Wiadomości', 
            'link' => '#'
        ),
        'Podstrony' => array(
            'title' => 'Podstrony', 
            'link' => '#')
    );
    if(array_key_exists($subpage, $headers))
        $result = $headers[$subpage];
       
    else
        $result = null;
    
    return $result;
}

function title($subpage){
    $result = headers($subpage);
    if($result != null && array_key_exists('title', $result))
        return $result['title'];

    else
        return $subpage;
    
}

function page_link($subpage){
    $result = headers($subpage);
    if($result != null && array_key_exists('page_link', $result))
        return $result['page_link'];

    else
        return '#';

}
