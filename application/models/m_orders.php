<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/14
 * Time: 18:21
 */

class m_orders extends CI_Model
{
    public $table_name = 'orders';
    public $members_table_name = 'members';
    public $packages_table_name ='packages';
    public $cabinets_table_name = 'cabinets';
    public $equipment_table_name = 'equipment';

    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }


    function searchorders($whereData=array(),$pageIndex,$pageSize)
    {

        //orderid=&startTime=&endTime=&type=&asdl_id=&username=&phoneNumber=



        $this->db->select('o.*,m.*,p.PackagesName as pName,e.equipmentName as eName,c.cabinetsNumber as cNumber');
        $this->db->from($this->table_name . ' o');
        $this->db->join($this->members_table_name . ' m','o.userid=m.id','left');
        $this->db->join($this->packages_table_name . ' p', 'm.packageid = p.id', 'left');
        $this->db->join($this->cabinets_table_name . ' c', 'm.cabinetsid = c.id', 'left');
        $this->db->join($this->equipment_table_name . ' e', 'm.equipmentid = e.id', 'left');

        if ((isset($whereData['startTime']) && !empty($whereData['startTime']))  &&  (isset($whereData['endTime']) && !empty($whereData['endTime']))) {
            $this->db->where('o.addTime >=', strtotime($whereData['startTime']));
            $this->db->where('o.addTime <=', strtotime($whereData['endTime']));
        }

        if (isset($whereData['username']) && !empty($whereData['username'])) {
            $this->db->where('m.username', $whereData['username']);
        }

        if (isset($whereData['phoneNumber']) && !empty($whereData['phoneNumber'])) {
            $this->db->where('m.phoneNumber', $whereData['phoneNumber']);
        }

        if (isset($whereData['type']) && !empty($whereData['type'])) {
            $this->db->where('o.type', $whereData['type']);
        }

        if (isset($whereData['asdl_id']) && !empty($whereData['asdl_id'])) {
            $this->db->where('m.asdl_id', $whereData['asdl_id']);
        }

        if (isset($whereData['orderid']) && !empty($whereData['orderid'])) {
            $this->db->where('o.orderid', $whereData['orderid']);
        }

        $data['count'] = $this->db->count_all_results();

        //echo $this->db->last_query();

        $this->db->select('o.*,m.*,p.PackagesName as pName,p.Price as pPrice,e.equipmentName as eName,e.price as ePrice,c.cabinetsNumber as cNumber');
        $this->db->from($this->table_name . ' o');
        $this->db->join($this->members_table_name . ' m','o.userid=m.id','left');
        $this->db->join($this->packages_table_name . ' p', 'm.packageid = p.id', 'left');
        $this->db->join($this->cabinets_table_name . ' c', 'm.cabinetsid = c.id', 'left');
        $this->db->join($this->equipment_table_name . ' e', 'm.equipmentid = e.id', 'left');

        if ((isset($whereData['startTime']) && !empty($whereData['startTime']))  &&  (isset($whereData['endTime']) && !empty($whereData['endTime']))) {
            $this->db->where('o.addTime >=', strtotime($whereData['startTime']));
            $this->db->where('o.addTime <=', strtotime($whereData['endTime']));
        }

        if (isset($whereData['username']) && !empty($whereData['username'])) {
            $this->db->where('m.username', $whereData['username']);
        }

        if (isset($whereData['phoneNumber']) && !empty($whereData['phoneNumber'])) {
            $this->db->where('m.phoneNumber', $whereData['phoneNumber']);
        }

        if (isset($whereData['type']) && !empty($whereData['type'])) {
            $this->db->where('o.type', $whereData['type']);
        }

        if (isset($whereData['asdl_id']) && !empty($whereData['asdl_id'])) {
            $this->db->where('m.asdl_id', $whereData['asdl_id']);
        }

        if (isset($whereData['orderid']) && !empty($whereData['orderid'])) {
            $this->db->where('o.orderid', $whereData['orderid']);
        }
        $this->db->limit($pageSize, ($pageIndex - 1) * $pageSize);


        $query = $this->db->get();
        $data['objlist'] = $query->result_array();

        return $data;


    }

    function getModelByOrderid($orderid)
    {
        $this->db->where('orderid',$orderid);
        $query = $this->db->get($this->table_name);

        return $query->row_array();
    }

    /*
     * insert
     * */
    function addorders($data = array())
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