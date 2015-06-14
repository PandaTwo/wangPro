<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/31
 * Time: 15:05
 */
class address extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
    }

    function index()
    {
        $data['content_text'] = 'address/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }
}