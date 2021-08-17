<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mails extends CI_Controller {

	public function index() {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
            // DEFAULT DATA
			$data = loadDefaultData();

			$data['rows'] = $this->back_m->get_all($this->uri->segment(2));
			echo loadSubViewsBack($this->uri->segment(2), 'index', $data);
		} else {
			redirect('panel');
		}
    }
    
	public function show($id) {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
            // DEFAULT DATA
            $data = loadDefaultData();
            
			$data['value'] = $this->back_m->get_one($this->uri->segment(2), $id);
			echo loadSubViewsBack($this->uri->segment(2), 'show', $data);
		} else {
			redirect('panel');
		}
    }
    
	public function send() {
        $data['contact'] = $this->back_m->get_one('contact_settings', 1);
        require 'application/libraries/mailer/config.php';
        require 'application/libraries/mailer/functions.php';
        require 'application/libraries/mailer/PHPMailerAutoload.php';

        $_POST['base_url'] = base_url(); 
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = $cfg['smtp_host'];
        $mail->SMTPAuth = true;         
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Username = $cfg['smtp_user'];
        $mail->Password = $cfg['smtp_pass'];
        $mail->Port = $cfg['smtp_port'];
        $mail->setFrom($cfg['smtp_user'], $data['contact']->company .  ' - odpowiedź');
        $mail->AddBCC($_POST['email']);
        if(!empty($_POST['email'])) {
            $mail->addReplyTo($_POST['email']);
        }
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $data['contact']->company .  ' - odpowiedź';
        $mail->Body    = build_mail_body($_POST, 'answer.php');
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        } else {
            $update['answer'] = 1;
            $this->back_m->update('mails', $update, $_POST['id']);  
        }
    }
}