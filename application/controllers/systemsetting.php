<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/30
 * Time: 16:31
 */

class systemsetting extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('m_setting');
    }


    function index()
    {
        $data['content_text'] = 'systemsetting';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['sourceList'] = $this->m_setting->getall();

        $this->load->view('template', $data);
    }

    function addpost()
    {
        $postdata = $this->input->post();

        $data = array(
            'title' => $postdata['title'],
            'value' => $postdata['value'],
            'remark' => floatval($postdata['remark']),
            'group' => ''
        );
        $res = $this->m_setting->addsetting($data);

        if ($res) {
            alert('添加成功', 'jump', '/systemsetting/');
        } else {
            alert('添加失败', 'jump', '/systemsetting/');
        }

    }


}