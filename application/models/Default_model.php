<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Default_model extends CI_Model
{
    public function get($tableName, $where = array())
    {
        return $this->db->where($where)->get($tableName)->row();
    }

    public function get_all($tableName, $where = array())
    {
        return $this->db->where($where)->get($tableName)->result();
    }
    
    public function insert($tableName, $data = array())
    {
        return $this->db->insert($tableName, $data);
    }

    public function update($tableName, $where = array(), $data = array())
    {
        return $this->db->where($where)->update($tableName, $data);
    }

    public function delete($tableName, $where = array())
    {
        return $this->db->where($where)->delete($tableName);
    }
}