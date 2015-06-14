<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/25
 * Time: 23:42
 */

class m_packages extends CI_Model
{

    public $table_name = 'packages'; // Set the name of the table for this model.

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

    function getwhere($data = array())
    {
        $this->db->where($data);
        $query = $this->db->get($this->table_name);

        return $query->result_array();
    }


    function deletePackages($id)
    {
        if(!$id) return false;

        $this->db->where('id',$id);
        $res = $this->db->delete($this->table_name);

        return $res ? true : false;
    }

    /*
     * insert
     * */
    function addPackages($data = array())
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