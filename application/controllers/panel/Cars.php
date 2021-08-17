<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cars extends CI_Controller
{

	public function index()
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$table = "ttt";
			// DEFAULT DATA
			$data = loadDefaultData();

			$data['rows'] = $this->back_m->get_all($table);

			echo loadSubViewsBack($this->uri->segment(2), 'index', $data);
		} else {
			redirect('panel');
		}
	}

	public function color()
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$table = "colors";
			// DEFAULT DATA
			$data = loadDefaultData();

			$data['rows'] = $this->back_m->get_all($table);

			echo loadSubViewsBack($this->uri->segment(2), 'color', $data);
		} else {
			redirect('panel');
		}
	}

	public function form($type, $id = '')
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$table = $this->uri->segment(2);

			// DEFAULT DATA
			$data = loadDefaultData();

			if ($id != '') {
				$data['value'] = $this->back_m->get_one($table, $id);
			}
			echo loadSubViewsBack($table, 'form', $data);
		} else {
			redirect('panel');
		}
	}

	public function color_form($type, $id = '')
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$table = 'colors';

			// DEFAULT DATA
			$data = loadDefaultData();
			$data['table'] = $table;

			if ($id != '') {
				$data['value'] = $this->back_m->get_one($table, $id);
			}
			echo loadSubViewsBack('cars', 'form', $data);
		} else {
			redirect('panel');
		}
	}

	public function action($type, $table, $id = '')
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {

			defaultFormAction($_POST, $table, $type, $id, TRUE);

			redirect('panel/' . 'cars');
		} else {
			redirect('panel');
		}
	}
}
