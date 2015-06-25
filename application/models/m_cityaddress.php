<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/14
 * Time: 15:09
 */

class m_cityaddress extends CI_Model
{
    public $table_name = 'cityaddress';
    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }


    function getTextAddressByIds($cityids)
    {
        $idArr = explode(',',$cityids);

        $frist = $this->getModel($idArr[0]);
        $second = $this->getModel($idArr[1]);
        $third = $this->getModel($idArr[2]);

        return $frist['class_name'].$second['class_name'].$third['class_name'];

    }

    function getTextaddress($id)
    {
        if(!$id) return "";
        $three =  $this->getModel($id);
        $two = $this->getModel($three['class_parent_id']);
        $one = $this->getModel($two['class_parent_id']);

        return $one['class_name'].$two['class_name'].$three['class_name'];
    }

    function updateModel($id,$data=array())
    {
        $this->db->where('class_id', $id);
        $res = $this->db->update($this->table_name, $data);

        return $res ? true : false;
    }

    function deletecityaddress($id)
    {
        if(!$id) return false;
        $this->db->where('class_id',$id);
        $res = $this->db->delete($this->table_name);
        return $res ? true : false;
    }


    /*
     * insert
     * */
    function addcityaddress($data = array())
    {
        $res = $this->db->insert($this->table_name,$data);
        if($res)
        {
            return true;
        }else{
            return false;
        }
    }

    /*
     * 根据parentid获取
     * */
    function getbyparentid($parentid)
    {
        $this->db->where(array('class_parent_id'=>$parentid));
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }

    function getModel($id)
    {
        $this->db->where(array('class_id'=>$id));
        $query = $this->db->get($this->table_name);
        return $query->row_array();
    }

    /*
     * 获取一级
     * */
    function getfiststepAll()
    {
        $this->db->where('class_type',1);

        $query = $this->db->get($this->table_name);

        return $query->result_array();
    }

    function getlistbywhere($where)
    {
        if(!$where) return null;

        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->result_array();
    }

}