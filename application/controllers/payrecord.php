<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/31
 * Time: 15:12
 * desc:收费记录
 */
class payrecord extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
    }

    function index()
    {
        $data['content_text'] = 'payrecord/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }
}