<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/30
 * Time: 21:29
 */

class m_equipment extends CI_Model
{
    public $table_name= 'equipment';
    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    function getAll()
    {
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }


    function deleteequipment($id)
    {
        if(!$id) return false;
        $this->db->where('id',$id);
        $res = $this->db->delete($this->table_name);
        return $res ? true : false;
    }

    /*
     * insert
     * */
    function addequipment($data = array())
    {
        $res = $this->db->insert($this->table_name,$data);
        if($res)
        {
            return true;
        }else{
            return false;
        }
    }
}