<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/26
 * Time: 0:29
 */

class m_adminuser extends CI_Model
{
    public $table_name = 'adminuser';

    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    function getall()
    {
        $this->db->order_by('id desc');
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }

    function updateadminuser($id,$data = array())
    {
        if($data) return false;
        $this->db->where('id',$id);
        $res = $this->db->update($this->table_name,$data);
        return $res ? true : false;
    }

    function deletebyid($id)
    {
        $this->db->where('id',$id);
        $res = $this->db->delete($this->table_name);
        return $res ? true : false;
    }

    function addadminuser($data = array())
    {
        if(!$data) {
            return false;
        }
        $res = $this->db->insert($this->table_name,$data);
        return $res ? true : false;
    }

    function getbyid($id)
    {
        if(!$id) return false;

        $this->db->where('id',$id);

        $query = $this->db->get($this->table_name);

        return $query->row_array();
    }


    function checkuserlogin($username,$password)
    {
        if(empty($username) || empty($password)) return false;

        $this->db->where(
            array(
                'username' => $username,
                'password' => $password
            )
        );
        $result = $this->db->get($this->table_name);
        if($result->num_rows() > 0)
        {
            return true;
        }

        return false;
    }
}