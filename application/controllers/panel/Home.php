<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		if(!isset($_SESSION['id'])){
			$this->form_validation->set_rules('login', 'Login', 'min_length[2]|trim');
			$this->form_validation->set_rules('password', 'Hasło', 'min_length[6]|trim');
			$this->form_validation->set_message('min_length', 'Pole %s ma za mało znaków');

			if ($this->form_validation->run() == FALSE){
	            $this->session->set_flashdata('flashdata', validation_errors());
				echo loadLogin('index');
			} else {
				$login = strtolower($this->input->post('login'));
	        	$password = $this->input->post('password');
				if($this->login_m->check_login($login, $password)){
					redirect('panel/dashboard');
				} else {
					echo loadLogin('index');
				}
			}
		}else redirect('panel/dashboard');
		
	}

	public function reset_pass() {
		$this->form_validation->set_rules('email', 'Adres E-mail', 'min_length[2]|trim|valid_email');
		$this->form_validation->set_message('min_length', 'Pole %s ma za mało znaków');
		$this->form_validation->set_message('valid_email', 'Błędny adres e-mail');

		if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('flashdata', validation_errors());
			echo loadLogin('reset_pass');
		} else {
			$email = strtolower($this->input->post('email'));
			if($this->login_m->check_email($email)){
				echo loadLogin('index');
			} else {
				echo loadLogin('reset_pass');
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
        $this->session->set_flashdata('flashdata', 'Poprawne wylogowanie');
		redirect('panel');
	}
	
}