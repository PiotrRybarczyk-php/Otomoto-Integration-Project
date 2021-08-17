<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subpages extends CI_Controller {

	public function index() {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
            // DEFAULT DATA
			$data = loadDefaultData();

			$data['subpages'] = $this->back_m->get_all('subpages');
			echo loadSubViewsBack('subpages', 'index', $data);
		} else {
			redirect('panel');
		}
	}

	public function form($type, $id = '') {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
            // DEFAULT DATA
			$data = loadDefaultData();
            // DEFAULT DATA
            if($id != '') {
			    $data['value'] = $this->back_m->get_one('subpages', $id);
            }
			echo loadSubViewsBack('subpages', 'form', $data);
		} else {
			redirect('panel');
		}
	} 

	public function action($type, $table, $id = '') {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			$now = date('Y-m-d');
			if (!is_dir('uploads/'.$now)) {
				mkdir('./uploads/' . $now, 0777, TRUE);
			}
			$config['upload_path'] = './uploads/'.$now;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
			$config['max_size'] = 0;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			foreach ($_POST as $key => $value) {
				if ($key == 'page') {
					 $this->form_validation->set_rules('page', 'Strona', 'required|is_unique[subpages.page]');
					 if ($this->form_validation->run() == FALSE){
			    		$this->session->set_flashdata('flashdata', 'Rekord dla takiej strony już istnieje!');
					 	redirect('panel/'.$table);
					 }
				}
				if($key == 'name_photo_1') {
					if ($this->upload->do_upload('photo_1')) {
						$data = $this->upload->data();
						$insert['photo'] = $now.'/'.$data['file_name'];
						if($data['image_width'] > 1440) {
							resizeImg($data['file_name'], $now, '1440');
						}    
						addMedia($data);
					} elseif($value == 'usunięte') {
						$insert['photo'] = '';
					}
				} else if($key == 'server_photo_1'){
					if($value != ''){
						$insert['photo'] = $value;
					}
					if($value == 'usunięte'){
						$insert['photo'] = '';
					}
					
				}else if($key == 'server_photo_2'){
					if($value != ''){
						$insert['photo2'] = $value;
					}
					if($value == 'usunięte'){
						$insert['photo2'] = '';
					}
					
				}else {
					$insert[$key] = $value; 
				}
            }
            if($type == 'insert') {
            	return false;
			    $this->back_m->insert($table, $insert);
			    $this->session->set_flashdata('flashdata', 'Rekord został dodany!');
            } else {
			    $this->back_m->update($table, $insert, $id);
			    $this->session->set_flashdata('flashdata', 'Rekord został zaktualizowany!');   
            }
			redirect('panel/'.$table);
		} else {
			redirect('panel');
		}
    }
}