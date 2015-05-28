<?php
/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/5/28
 * Time: 14:59
 */

class adminmenu extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();

        $this->load->model('m_adminmenu');
    }

    function index()
    {
        $data['content_text'] = 'menu/list';
        $data['show_menu'] = true;
        $data['sourceList'] = $this->m_adminmenu->getall();

        $this->load->view('template', $data);
    }

    function add()
    {
        $data['content_text'] = 'menu/list';
        $data['show_menu'] = true;

        $this->load->view('template', $data);
    }


}