<?php
/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/7/1
 * Time: 17:07
 */

class magic extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();

        $this->load->model('m_members');
    }


    function index()
    {
        $data['content_text'] = 'magic/sendmsg';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }


    function postsendmsg()
    {
        //获取最近7天到期用户列表


    }


}