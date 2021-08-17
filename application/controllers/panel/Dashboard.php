<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			$data = loadDefaultData();
			echo loadViewsBack('index', $data);
		} else {
			redirect('panel');
		}
	}

}