<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->db->table_exists('user')) {
			$this->base_m->create_base();
		}
	}

	public function index()
	{
		$data = loadDefaultDataFront();
		echo loadViewsFront('index', $data);
	}
}
