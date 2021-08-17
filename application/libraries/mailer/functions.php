<?php

function build_mail_body($post, $template){
  $content = file_get_contents('application/libraries/mailer/templates/'.$template);
  foreach($post as $k => $v){
    $content = str_replace('{'.$k.'}', $v, $content);
  }

  return $content;
}