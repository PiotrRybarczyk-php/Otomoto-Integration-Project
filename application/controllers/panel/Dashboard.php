<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	public function index()
	{
		set_url();
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$data = loadDefaultData();
			echo loadViewsBack('index', $data);
		} else {
			redirect('panel');
		}
	}
}
