<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {

	public function index() {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			$table = $this->uri->segment(2);

			if (!$this->db->table_exists($table)){
				$this->base_m->create_table($table);
			}
            // DEFAULT DATA
			$data = loadDefaultData();

			$data['rows'] = $this->back_m->get_all($table);

			echo loadSubViewsBack($this->uri->segment(2), 'index', $data);
		} else {
			redirect('panel');
		}
	}

	public function form($type, $id = '') {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			$table = $this->uri->segment(2);

            // DEFAULT DATA
			$data = loadDefaultData();

            if($id != '') {
			    $data['value'] = $this->back_m->get_one($table, $id);
            }
			echo loadSubViewsBack($table, 'form', $data);
		} else {
			redirect('panel');
		}
	} 

	public function action($type, $table, $id = '') {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {

			defaultFormAction($_POST, $table, $type, $id, TRUE);

			redirect('panel/'.$table);
		} else {
			redirect('panel');
		}
    }
}