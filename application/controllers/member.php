<?php
/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/5/28
 * Time: 11:35
 */

class member extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
    }

    function index()
    {
        $data['content_text'] = 'member/list';
        $data['show_menu'] = true;
        //$data['sourceList'] = $this->m_adminuser->getall();

        $this->load->view('template', $data);
    }

    /*
     * 修改资料
     * */
    function edit()
    {
        $data['content_text'] = 'member/edit';
        $data['show_menu'] = true;
        //$data['sourceList'] = $this->m_adminuser->getall();

        $this->load->view('template', $data);
    }

    /*
     * 用户登记
     * */
    function registraion()
    {
        $data['content_text'] = 'member/registraion';
        $data['show_menu'] = true;
        //$data['sourceList'] = $this->m_adminuser->getall();

        $this->load->view('template', $data);
    }

    /*
     * 登记列表
     * */
    function registraionlist()
    {
        $data['content_text'] = 'member/registraionlist';
        $data['show_menu'] = true;
        //$data['sourceList'] = $this->m_adminuser->getall();

        $this->load->view('template', $data);
    }


}