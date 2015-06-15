<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/16
 * Time: 0:55
 */

class sms extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
    }

    /*
     * 短信列表
     * */
    function index()
    {
        $data['content_text'] = 'sms/edit';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }

    /*
     * 发送短信
     * */
    function sendsms()
    {
        $data['content_text'] = 'sms/sendmsg';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }

    /*
     * 短信设置
     * */
    function smssetting()
    {
        $data['content_text'] = 'sms/smssetting';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }
}