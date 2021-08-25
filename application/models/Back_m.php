<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Back_m extends CI_Model
{
    public function get_all($table)
    {
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_by($table, $col1, $col2, $param1, $param2)
    {
        $this->db->where([$col1 => $param1]);
        $this->db->where([$col2 => $param2]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_car_noFeat($table, $col1, $param1)
    {
        $query = $this->db->query('SELECT * FROM ' . $table . ' WHERE ' . $col1 . ' = ' . $param1 . ' AND meta_key != "features"');
        return $query->result();
    }

    public function get_car($table, $col1, $param1)
    {
        $this->db->where([$col1 => $param1]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_models($table, $col1, $id)
    {
        $this->db->where([$col1 => $id]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_with_limit($table, $limit, $sort = null)
    {
        $this->db->limit($limit);
        if ($sort != null) {
            $this->db->order_by('created', $sort);
        }
        $query = $this->db->get($table);
        return $query->result();
    }


    public function get_one($table, $id)
    {
        $this->db->where(['id' => $id]);
        $query = $this->db->get($table);
        return $query->row();
    }

    public function get_api_photos()
    {
        $this->db->where(['is_photo' => 1]);
        $query = $this->db->get('media');
        return $query->result();
    }

    public function get_subpage($page)
    {
        $this->db->where(['page' => $page]);
        $query = $this->db->get('subpages');
        return $query->row();
    }


    public function get_images($table, $table_name, $id)
    {
        $this->db->where([
            'item_id' => $id,
            'table_name' => $table_name,
        ]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_car_images($table, $id)
    {
        $this->db->where([
            'car_id' => $id,
        ]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function insert($table, $data)
    {
        //$data = $this->security->xss_clean($data);
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function insert_features($features)
    {
        $data = array('meta_key' => 'features', 'meta_val' => $features);
        //$data = $this->security->xss_clean($data);
        $query = $this->db->insert('otomoto_cars_meta', $data);
        return $query;
    }

    public function update($table, $data, $id)
    {
        //$data = $this->security->xss_clean($data);
        $this->db->where(['id' => $id]);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function update_features($features, $id)
    {
        $data = array('meta_key' => 'features', 'meta_val' => $features);
        $this->db->where(['car_id' => $id]);
        $this->db->where(['meta_key' => 'features']);
        $query = $this->db->update('otomoto_cars_meta', $data);
        return $query;
    }

    public function delete($table, $id)
    {
        $this->db->where(['id' => $id]);
        $query = $this->db->delete($table);
        return $query;
    }
}
