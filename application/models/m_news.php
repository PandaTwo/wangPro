<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/29
 * Time: 22:11
 */

class m_news extends CI_Model
{
    public $table_name = 'news';

    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    /*
     * 获取分页列表记录
     * */
    function getlist($pageIndex,$pageSize)
    {
        $this->db->select('s.*');
        $this->db->from($this->table_name . ' as s');
        $data['count'] = $this->db->count_all_results();

        $this->db->select('s.*');
        $this->db->from($this->table_name . ' as s');
        $this->db->limit($pageSize, ($pageIndex - 1) * $pageSize);
        $this->db->order_by('addtime','desc');
        $query = $this->db->get();
        $data['objlist'] = $query->result_array();

        return $data;
    }

    function updateModel($id,$data=array())
    {
        $this->db->where('id', $id);
        $res = $this->db->update($this->table_name, $data);

        return $res ? true : false;
    }

    function getModel($id)
    {
        $this->db->where(array('id'=>$id));
        $query = $this->db->get($this->table_name);
        return $query->row_array();
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


    function deletenews($id)
    {
        if(!$id) return false;

        $this->db->where('id',$id);
        $res = $this->db->delete($this->table_name);

        return $res ? true : false;
    }

    /*
     * insert
     * */
    function addnews($data = array())
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