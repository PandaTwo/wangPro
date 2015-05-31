<?php
/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/5/28
 * Time: 13:59
 */

class m_adminmenu extends CI_Model
{

    public $table_name = 'adminmenu';

    function __construct()
    {
        parent :: __construct();

        $this->load->database();
    }


    /*
     * 根据条件查询菜单表
     * */
    function selectWhere($data = array())
    {
        if(!$data)
        {
            $this->db->order_by('sort asc');
            $query = $this->db->get($this->table_name);
            return $query->result_array();
        }
        $this->db->order_by('sort asc');
        $this->db->where($data);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }

    function deletebyid($id)
    {
        $this->db->where('id',$id);

        $res = $this->db->delete($this->table_name);

        return $res ? true :false;
    }

    /*
     * 获取一条数据
     * */
    function getbyid($id)
    {
        if(!$id) return array();

        $this->db->where('id',$id);
        $query = $this->db->get($this->table_name);
        return $query->row_array();
    }

    /*
     * 添加
     * */
    function addadminmenu($data = array())
    {
        if(!$data) return false;

        $res = $this->db->insert($this->table_name,$data);

        return $res ? true : false;
    }

}