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
            return $query->row_array();
        }
        $this->db->where($data);
        $query = $this->db->get($this->table_name);
        return $query->row_array();
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