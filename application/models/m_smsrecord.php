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

    function __construct()
    {
        parent :: __construct();
    }

    /*
     * 添加短信发送记录
     * */
    function insertsmsrecord($data)
    {
        return $this->db->insert($this->table_name,$data) ? true : false;
    }
}