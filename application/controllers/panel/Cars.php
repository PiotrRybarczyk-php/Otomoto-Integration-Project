<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cars extends CI_Controller
{

	public function index()
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$table = "cars";
			// DEFAULT DATA
			$data = loadDefaultData();
			$data['rows'] = $this->back_m->get_all($table);
			echo loadSubViewsBack($this->uri->segment(2), 'index', $data);
		} else {
			redirect('panel');
		}
	}

	public function gallery($id)
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			// DEFAULT DATA
			$data = loadDefaultData();

			$data['project'] = $this->back_m->get_one('cars', $id);
			$data['files'] = $this->back_m->get_car_images('car_files', $id);

			echo loadSubViewsBack($this->uri->segment(2), 'gallery', $data);
		} else {
			redirect('panel');
		}
	}

	public function form($type, $id = '')
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$table = 'cars';

			// DEFAULT DATA
			$data = loadDefaultData();
			$data['brands'] = $this->back_m->get_all('brands');
			$data['dealer'] = $this->back_m->get_all('salons');
			$data['color'] = $this->back_m->get_all('colors');
			$data['users'] = $this->back_m->get_all('user');

			if ($id != '') {
				$data['value'] = $this->back_m->get_one($table, $id);
				$data['meta'] = $this->back_m->get_by('otomoto_cars_meta', 'car_id', 'meta_key', $id, 'features');
				$array_dump = array();
				$var_dump = $this->back_m->get_car_noFeat('otomoto_cars_meta', 'car_id', $id);
				foreach ($var_dump as $item) $array_dump[$item->meta_key] = $item->meta_val;
				unset($var_dump);
				$data['car'] = $array_dump;
			}
			echo loadSubViewsBack($table, 'form', $data);
		} else {
			redirect('panel');
		}
	}

	public function otomoto_form($id = '')
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$table = 'cars';

			// DEFAULT DATA
			$data = loadDefaultData();
			if ($id != '') {
				$data['car'] = $this->back_m->get_one($table, $id);
				$data['models'] = $this->back_m->get_models('brand_models', 'brand_id', $data['car']->brand_id);
				$data['salon'] = $this->back_m->get_one('salons', $data['car']->salon_id);
				$data['brand'] = $this->back_m->get_one('brands', $data['car']->brand_id);
				$data['color'] = $this->back_m->get_one('colors', $data['car']->color);
				$array_dump = array();
				$var_dump = $this->back_m->get_car_noFeat('otomoto_cars_meta', 'car_id', $id);
				foreach ($var_dump as $item) $array_dump[$item->meta_key] = $item->meta_val;
				unset($var_dump);
				$data['value'] = $array_dump;
			}
			echo loadSubViewsBack($table, 'otomoto_form', $data);
		} else {
			redirect('panel');
		}
	}

	public function post_car($id = '')
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {

			// DEFAULT DATA
			$data = loadDefaultData();
			$account = $this->back_m->get_one('otomoto_accounts', $_POST['account']);
			curl_getToken($account->username, $account->password);
			if ($id != '') {
				$car = $this->back_m->get_car('otomoto_cars_meta', 'car_id', $id);
				$coords['latitude'] = $account->latitude;
				$coords['longitude'] = $account->longitude;
				$result = add_car($car, $coords);
			}
			redirect('panel/cars');
		} else {
			redirect('panel');
		}
	}

	public function action($type, $table, $id = '')
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {

			defaultFormAction($_POST, $table, $type, $id);

			redirect('panel/' . 'cars');
		} else {
			redirect('panel');
		}
	}

	public function otomoto_action($table, $id = '')
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$insert = array();
			$update = array();

			foreach ($_POST as $key => $value) {
				$temp = $this->back_m->get_by($table, 'car_id', 'meta_key', $id, $key)[0]->id ?? 'blank';
				if ($key == 'contact') $value = '{"person": "Michał Ignaszak"}';
				if ($key == 'price') $value = '{"0": "arranged","1": ' . $value . ',"currency": "PLN","gross_net": "gross"}';
				if ($key != 'salon') {
					if ($temp == 'blank') {
						$insert['car_id'] = $id;
						$insert['meta_key'] = $key;
						$insert['meta_val'] = $value;
						//print_r('insert:' . $key . " = " . $value);
						$this->back_m->insert($table, $insert);
					} else {
						$update['car_id'] = $id;
						$update['meta_key'] = $key;
						$update['meta_val'] = $value;
						//print_r('update:' . $key . " = " . $value);
						$this->back_m->update($table, $update, $temp);
					}
					//echo '<br>';
				}
				unset($temp);
			}
			//exit;

			redirect('panel/cars/otomoto_confirm/' . $id);
		} else {
			redirect('panel');
		}
	}
	public function otomoto_confirm($id)
	{
		if (checkAccess($access_group = ['admin', 'handlowiec'], $_SESSION['rola'])) {
			$table = "otomoto_accounts";
			// DEFAULT DATA
			$data = loadDefaultData();
			$data['rows'] = $this->back_m->get_all($table);
			$data['car_id'] = $id;
			echo loadSubViewsBack($this->uri->segment(2), 'otomoto_confirm', $data);
		} else {
			redirect('panel');
		}
	}
}
