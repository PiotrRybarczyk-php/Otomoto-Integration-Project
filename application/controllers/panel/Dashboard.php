<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	public function index()
	{
		set_url('otomoto_test', 'https://www.otomoto.pl/api/open');
		set_url('otomoto_auth', 'https://www.otomoto.pl/api/open/oauth/token');
		set_url('otomoto_advert', 'https://www.otomoto.pl/api/open/account/adverts');
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$data = loadDefaultData();
			echo loadViewsBack('index', $data);
		} else {
			redirect('panel');
		}
	}
}
