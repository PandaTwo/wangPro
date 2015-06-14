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

    public $cabinets_table_name = 'cabinets';

    public $equipment_table_name = 'equipment';

    function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    function getallmembers($pageIndex, $pageSize, $searchKeywords)
    {

        $this->db->select('m.*,p.PackagesName as pName,e.equipmentName as eName,c.cabinetsNumber as cNumber');
        $this->db->from($this->table_name . ' as m');
        $this->db->join($this->packages_table_name . ' p', 'm.packageid = p.id', 'left');
        $this->db->join($this->cabinets_table_name . ' c', 'm.cabinetsid = c.id', 'left');
        $this->db->join($this->equipment_table_name . ' e', 'm.equipmentid = e.id', 'left');
        $this->db->where('m.serviceSatus', '正常');
        if ($searchKeywords) {
            $this->db->where("(m.adsl_id LIKE '$searchKeywords' OR m.username LIKE '$searchKeywords' OR m.phoneNumber LIKE '$searchKeywords')");
        }

        $data['count'] = $this->db->count_all_results();

        $this->db->select('m.*,p.PackagesName as pName,e.equipmentName as eName,c.cabinetsNumber as cNumber');
        $this->db->from($this->table_name . ' as m');
        $this->db->join($this->packages_table_name . ' p', 'm.packageid = p.id', 'left');
        $this->db->join($this->cabinets_table_name . ' c', 'm.cabinetsid = c.id', 'left');
        $this->db->join($this->equipment_table_name . ' e', 'm.equipmentid = e.id', 'left');
        $this->db->where('m.serviceSatus', '正常');
        if ($searchKeywords) {

            $this->db->where("(m.adsl_id LIKE '$searchKeywords' OR m.username LIKE '$searchKeywords' OR m.phoneNumber LIKE '$searchKeywords')");

        }

        $this->db->limit($pageSize, ($pageIndex - 1) * $pageSize);


        $query = $this->db->get();
        $data['objlist'] = $query->result_array();

        return $data;
    }

    function getNewmembers()
    {
        $this->db->select('m.*,p.PackagesName as pName');
        $this->db->from($this->table_name . ' as m');
        $this->db->join($this->packages_table_name . ' p', 'm.packageid = p.id', 'left');
        $this->db->limit(10);
        $this->db->where(array('m.serviceSatus' => '正常'));

        $query = $this->db->get();

        return $query->result_array();
    }

    /*
     *
     * 添加新项
     * */
    function addmembers($data = array())
    {
        if (!$data) return false;

        $res = $this->db->insert($this->table_name, $data);

        return $res ? true : false;
    }

    /*
     * 登记列表
     * */
    function memberRegistraionList()
    {
        $this->db->select('m.*,p.PackagesName as pName');
        $this->db->from($this->table_name . ' as m');
        $this->db->join($this->packages_table_name . ' p', 'm.packageid = p.id', 'left');

        $this->db->where(array('m.serviceSatus' => null));

        $query = $this->db->get();

        return $query->result_array();
    }

    function getMemberByid($id)
    {
        if (!$id) return false;
        $this->db->where(array('id' => $id));
        $query = $this->db->get($this->table_name);

        return $query->row_array();
    }

    function searchrenewals($where)
    {
        if (isset($where['username']) && !empty($where['username'])) {
            $this->db->where('username', $where['username']);
        }
        if (isset($where['phoneNumber']) && !empty($where['phoneNumber'])) {
            $this->db->where('phoneNumber', $where['phoneNumber']);
        }

        //$this->db->where('serviceSatus', null);
        $query = $this->db->get($this->table_name);
        return $query->row_array();

        return null;

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


        return $res ? true : false;

    }
}