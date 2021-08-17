<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $pass[] = 1;
        return implode($pass);
    }

    function hashPassword($password) {
        $options = ['cost' => 12];
        $encripted_pass = password_hash($password, PASSWORD_BCRYPT, $options);
        return $encripted_pass;
    }

    function send_new_password($id, $email) {
        $new_password = randomPassword();
        $CI = &get_instance();
        $CI->load->library('email');          
        $config = array(
            'smtp_host' =>"smtp.adawards.pl",
            'smtp_user' =>"no-reply-car@adawards.pl",
            'smtp_pass' =>"8lllRuWL4H",
            'smtp_port' =>"587",
            'smtp_timeout' =>"30",
            'mailtype'  =>"html",
        );
        $CI->email->initialize($config);
        $CI->email->from('no-reply-car@adawards.pl', 'Resetowanie hasła');
        $CI->email->to($email);
        $CI->email->subject('Twoje nowe hasło!');
        $CI->email->message('Twoje nowe hasło do panelu to:<br><h4><strong>'.$new_password.'</strong></h4>');
        if($CI->email->send()) {
            $update['password'] = hashPassword($new_password);
            $CI->back_m->update('users', $update, $id);
            $CI->session->set_flashdata('flashdata', 'Na Twój adres e-mail zostało wysłane nowe hasło do panelu');
            return true;
        } else {
            $CI->session->set_flashdata('flashdata', 'Błąd podczas wysyłania wiadomości. Hasło NIE zostało zmienione');
            return false;
        }
    }