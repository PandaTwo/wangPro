<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/26
 * Time: 0:29
 */

class m_adminuser extends MY_Model
{
    public $table_name = 'adminuser';
    function __construct()
    {
        parent :: __construct();
    }

    function getlist()
    {
        $this->db->order_by('id desc');

        $query = $this->db->get($this->table_name);

        return $query->result_array();
    }

    function update($data = array())
    {
        if($data) return false;
        $this->db->where('id',$data['id']);
        $res = $this->db->update($this->table_name,$data);
        return $res ? true : false;
    }

    function deletebyid($id)
    {
        $this->db->where('id',$id);
        $res = $this->db->delete($this->table_name);
        return $res ? true : false;
    }

    function add($data)
    {
        if($data) return false;

        return $this->db->insert($this->table_name,$data);
    }
}