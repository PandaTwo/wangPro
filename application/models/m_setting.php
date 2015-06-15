<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/31
 * Time: 14:40
 */
class m_setting extends CI_Model
{

    public $table_name = 'setting';
    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    /*
     * 根据名称修改配置
     * */
    function updateModelByName($name,$data=array())
    {
        $this->db->where('title',$name);
        $res = $this->db->update($this->table_name, $data);

        return $res ? true : false;
    }

    /*
     * 根据名称获取一条数据
     * */
    function getModelByName($name)
    {
        $this->db->where('title',$name);

        $query = $this->db->get($this->table_name);

        return $query->row_array();
    }

    function updateModel($id,$data=array())
    {
        $this->db->where('id', $id);
        $res = $this->db->update($this->table_name, $data);

        return $res ? true : false;
    }

    function getAll()
    {
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }

    function getModel($id)
    {
        $this->db->where(array('id'=>$id));

        $query = $this->db->get($this->table_name);

        return $query->row_array();
    }


    function deletesetting($id)
    {
        if(!$id) return false;

        $this->db->where('id',$id);
        $res = $this->db->delete($this->table_name);
        return $res ? true : false;
    }

    /*
     * insert
     * */
    function addsetting($data = array())
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