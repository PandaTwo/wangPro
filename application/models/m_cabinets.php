<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/30
 * Time: 21:26
 */

class m_cabinets extends CI_Model
{
    public $table_name = 'cabinets';
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


    function deletecabinets($id)
    {
        if(!$id) return false;

        $this->db->where('id',$id);
        $res = $this->db->delete($this->table_name);

        return $res ? true : false;
    }

    /*
     * insert
     * */
    function addcabinets($data = array())
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