<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/31
 * Time: 14:38
 * desc:邮箱设置
 */

class mailsetting extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();

        $this->load->model('');
    }

    function index()
    {
        $data['content_text'] = 'cabinets/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['sourceList'] = $this->m_cabinets->getall();

        $this->load->view('template', $data);
    }


}