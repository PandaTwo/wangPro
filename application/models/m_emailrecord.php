<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/21
 * Time: 11:16
 */

class m_emailrecord extends CI_Model
{
    public $table_name = 'emailrecord';

    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }


    function getModel($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get($this->table_name);

        return $query->result_array();
    }

    /*
     * 添加短信发送记录
     * */
    function insertemailrecord($data)
    {
        return $this->db->insert($this->table_name,$data) ? true : false;
    }

    /*
     * 根据id删除项
     * */
    function deletebyid($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table_name);
    }

    /*
     * 获取分页列表记录
     * */
    function getlist($pageIndex,$pageSize)
    {
        $this->db->from($this->table_name);
        $data['count'] = $this->db->count_all_results();

        $this->db->from($this->table_name);
        $this->db->limit($pageSize, ($pageIndex - 1) * $pageSize);
        $this->db->order_by('addtime','desc');
        $query = $this->db->get();
        $data['objlist'] = $query->result_array();

        return $data;
    }
}