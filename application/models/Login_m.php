<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model  
{
    public function check_login($login, $password) {
        $data['users'] = $this->back_m->get_all('users');
        
		foreach($data['users'] as $check) {
			if(($login == $check->login || $login == $check->email) && (password_verify($password, $check->password)) &&$check->active == '1') {
				$session_data['id'] = $check->id;
				$session_data['first_name'] = $check->first_name;
				$session_data['last_name'] = $check->last_name;
				$session_data['email'] = $check->email;
				$session_data['name'] = $check->login;
				$session_data['rola'] = $check->rola;
				$session_data['login'] = TRUE;
				$this->session->set_userdata($session_data);
				$logged = true;
                break;
            } else {
				$logged = false;
            }
        }
            
		if($logged == false) {
			$this->session->set_flashdata('flashdata', 'Błędny login lub hasło lub konto nie zostało aktywowane');
            return false;
		} else {
			$this->session->set_flashdata('flashdata', 'Zostałeś poprawnie zalogowany');
            return true;
        }
    }

    public function check_email($email) {
        $data['users'] = $this->back_m->get_all('users');
		foreach($data['users'] as $check) {
			if($email == $check->email && $check->active == '1') {
				if(send_new_password($check->id, $check->email)){
                    return true;
                } else {
                    return false;
                }
                break;
            } else {
                $this->session->set_flashdata('flashdata', 'Błędny adres E-mail lub Twoje konto nie zostało aktywowane');
				return false;
            }
        }
    }
}
