<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public function index() {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			if (!$this->db->table_exists($this->uri->segment(2))){
				$this->base_m->create_table($this->uri->segment(2));
			}
            // DEFAULT DATA
			$data = loadDefaultData();

			$data['rows'] = $this->back_m->get_all($this->uri->segment(2));
			echo loadSubViewsBack($this->uri->segment(2), 'index', $data);
		} else {
			redirect('panel');
		}
	}

	public function form($type, $id = '') {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
            // DEFAULT DATA
			$data = loadDefaultData();

            if($id != '') {
			    $data['value'] = $this->back_m->get_one($this->uri->segment(2), $id);
            }
			echo loadSubViewsBack($this->uri->segment(2), $type, $data);
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
			$config['allowed_types'] = '*';
			$config['max_size'] = 0;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			foreach ($_POST as $key => $value) {

				if (!$this->db->field_exists($key, $table)) {
					$this->base_m->create_column($table, $key);
				}

				if($key == 'name_file_1') {
					if ($this->upload->do_upload('file_1')) {
						$data = $this->upload->data();
						$insert['name'] = $data['file_name'];   
						$insert['raw_name'] = $data['raw_name'];   
						$insert['type'] = $data['file_type'];   
						$insert['size'] = $data['file_size'];   
						$insert['full_path'] = $data['full_path'];   
						$insert['file_path'] = $data['file_path'];
						if ($data['file_type'] != 'image/svg' && isOnWebp()) {
							//WebP Converter
							$photoWebP = convertImageToWebP($now . '/' . $insert['name']);
							$keyFieldPhotoWebP = 'photo_webp';
							if ($photoWebP[0] == true) {
								$insert[$keyFieldPhotoWebP] = $now . '/' . $photoWebP[1];
								createWebPField($table, $keyFieldPhotoWebP);
							} else {
								$this->session->set_flashdata('flashdata', 'Zdjęcie nie zostało poprawnie zoptymalizowane!');
							}
							//WebP Converter
						}   
					}
				} else {
					$insert[$key] = $value; 
				}
            }
            if($type == 'insert') {
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