<?php
defined('BASEPATH') or exit('No direct script access allowed');
function defaultFormAction($post, $table, $type, $id, bool $photo = FALSE)
{
    $CI = &get_instance();
    if ($photo  == TRUE) {
        $now = date('Y-m-d');
        if (!is_dir('uploads/' . $now)) {
            mkdir('./uploads/' . $now, 0777, TRUE);
        }
        $config['upload_path'] = './uploads/' . $now;
        $config['allowed_types'] = '*';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $CI->load->library('upload', $config);
        $CI->upload->initialize($config);
    }
    $spec = '[';
    foreach ($post as $key => $value) {

        /*if (!$CI->db->field_exists($key, $table)) {
            $CI->base_m->create_column($table, $key);
        }*/
        if ($photo === TRUE) {
            if (!$CI->db->field_exists('photo2', $table)) {
                $CI->base_m->create_column($table, 'photo2');
            }

            if ($key == 'name_photo_1') {
                if ($CI->upload->do_upload('photo_1')) {
                    $data = $CI->upload->data();
                    $insert['photo'] = $now . '/' . $data['file_name'];
                    if ($data['image_width'] > 1440) {
                        resizeImg($data['file_name'], $now, '1440');
                    }
                    if ($data['file_type'] != 'image/svg' && isOnWebp()) {
                        //WebP Converter
                        $photoWebP = convertImageToWebP($insert['photo']);
                        $keyFieldPhotoWebP = 'photo_webp';
                        if ($photoWebP[0] == true) {
                            $insert[$keyFieldPhotoWebP] = $now . '/' . $photoWebP[1];
                            createWebPField($table, $keyFieldPhotoWebP);
                        } else {
                            $CI->session->set_flashdata('flashdata', 'Zdjęcie nie zostało poprawnie zoptymalizowane!');
                        }
                        //WebP Converter
                    }
                    addMedia($data);
                } elseif ($value == 'usunięte') {
                    $insert['photo'] = '';
                }
            } else if ($key == 'server_photo_1') {
                if ($value != '') {
                    $insert['photo'] = $value;
                }
                if ($value == 'usunięte') {
                    $insert['photo'] = '';
                }
            } else if ($key == 'server_photo_2') {
                if ($value != '') {
                    $insert['photo2'] = $value;
                }
                if ($value == 'usunięte') {
                    $insert['photo2'] = '';
                }
            } else {
                print_r('lol');
                //$insert[$key] = $value;
            }
        } else {
            if (strpos($key, 'features') !== false) {
                for ($i = 0; $i < count($value); $i++) {
                    $spec .= '"' . $value[$i] . '",';
                }
            } else {
                $insert[$key] = $value;
            }
        }
    }
    $spec = substr($spec, 0, -1);
    $spec .= ']';
    if ($type == 'insert') {
        $CI->back_m->insert($table, $insert);
        $CI->back_m->insert_features($spec);
        //$CI->back_m->insert_carMeta($cardata);
        $CI->session->set_flashdata('flashdata', 'Rekord został dodany!');
    } else {
        $CI->back_m->update($table, $insert, $id);
        $CI->back_m->update_features($spec, $id);
        $CI->session->set_flashdata('flashdata', 'Rekord został zaktualizowany!');
    }
}
