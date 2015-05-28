<?php
/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/5/28
 * Time: 13:56
 */

class common_menu extends MY_Controller
{


    function __construct()
    {
        parent :: __construct();

        $this->load->model('m_adminmenu');
    }

    function index()
    {
        $data['list'] = $this->m_adminmenu->selectWhere();

        $this->load->view('include/menu',$data);
    }
}