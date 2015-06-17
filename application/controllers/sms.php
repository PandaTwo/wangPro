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

        $this->load->model('m_setting');
        $this->load->library('smsservice');
    }

    /*
     * 短信列表
     * */
    function index()
    {
        $data['content_text'] = 'sms/smslist';
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

        $data['smssetting'] = $this->m_setting->getAllByGroup('sms');

        $this->load->view('template', $data);
    }

    function postsmssetting()
    {
        $postdata = $this->input->post();
        foreach($postdata as $key=>$val)
        {
            $this->m_setting->updateModelByName($key,$val);
        }
        alert('修改成功','jump','/sms/smssetting');
    }

    /*
     * 发送测试短信
     * */
    function postsendtestsms()
    {
        $postdata = $this->input->post();
        foreach($postdata as $key=>$val)
        {
            $this->m_setting->updateModelByName($key,$val);
        }
        //发送短信

        alert('修改成功','jump','/sms/smssetting');
    }
}