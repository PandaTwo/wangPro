<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/16
 * Time: 23:13
 */

class m_smsrecord extends CI_Model
{
    public $table_name = 'smsrecord';

    public $members_table_name = 'members';

    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    /*
     * 添加短信发送记录
     * */
    function insertsmsrecord($data)
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
        $this->db->select('s.*');
        $this->db->from($this->table_name . ' as s');
        $this->db->join($this->members_table_name . ' m', 's.userid = m.id', 'left');
        $data['count'] = $this->db->count_all_results();

        $this->db->select('s.*,s.id as sid,m.*');
        $this->db->from($this->table_name . ' as s');
        $this->db->join($this->members_table_name . ' m', 's.userid = m.id', 'left');
        $this->db->limit($pageSize, ($pageIndex - 1) * $pageSize);
        $this->db->order_by('sendtime','desc');
        $query = $this->db->get();
        $data['objlist'] = $query->result_array();

        return $data;
    }
}