<?php
/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/6/2
 * Time: 12:48
 */

class m_members extends CI_Model
{

    public $table_name = 'members';

    public $packages_table_name = 'packages';

    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    /*
     *
     * 添加新项
     * */
    function addmembers($data = array())
    {
        if(!$data) return false;

        $res = $this->db->insert($this->table_name,$data);

        return $res ? true : false;
    }

    /*
     * 登记列表
     * */
    function memberRegistraionList()
    {
        $this->db->select('m.*,p.PackagesName as pName');
        $this->db->from($this->table_name.' as m');
        $this->db->join($this->packages_table_name.' p', 'm.packageid = p.id', 'left');

        $this->db->where(array('m.serviceSatus'=>null));

        $query = $this->db->get();

        return $query->result_array();
    }

    function getMemberByid($id)
    {
        if(!$id) return false;
        $this->db->where(array('id'=>$id));
        $query = $this->db->get($this->table_name);

        return $query->row_array();
    }

    /*
     * 更新
     * */
    function updateMemberById($data = array())
    {
        $id = intval($data['id']);

        unset($data['id']);

        $this->db->where('id', $id);
        $res = $this->db->update($this->table_name, $data);


        return $res ? true :false;

    }
}