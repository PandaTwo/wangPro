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
        parent:: __construct();
        $this->load->model('m_setting');
    }


    function deletesetting()
    {
        $id = $this->input->get('id');
        $res = $this->m_setting->deletesetting($id);
        if ($res) {
            alert('删除成功', 'jump', '/systemsetting/');
        } else {
            alert('删除失败', 'jump', '/systemsetting/');
        }

    }


    function index()
    {
        $data['content_text'] = 'systemsetting';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['sourceList'] = $this->m_setting->getall();

        $getdata = $this->input->get();

        if ($getdata['action'] == 'update') {
            $id = $this->input->get('id');
            $model = $this->m_setting->getModel($id);
            $data['updateModel'] = $model;


        }

        if ($getdata['action'] == 'delete') {
            $id = $this->input->get('id');
            $res = $this->m_setting->deletesetting($id);
            if ($res) {
                alert('删除成功', 'jump', '/systemsetting/');
            } else {
                alert('删除失败', 'jump', '/systemsetting/');
            }
        }

        $this->load->view('template', $data);
    }

    function updatepost()
    {
        $postdata = $this->input->post();
        $id = $postdata['id'];

        $data = array(
            'title' => $postdata['title'],
            'value' => $postdata['value'],
            'remark' => $postdata['remark'],
            'group' => $postdata['group']
        );
        $res = $this->m_setting->updateModel($id,$data);
        if ($res) {
            alert('修改成功', 'jump', '/systemsetting/');
        } else {
            alert('修改失败', 'jump', '/systemsetting/');
        }

    }

    function addpost()
    {
        $postdata = $this->input->post();

        $data = array(
            'title' => $postdata['title'],
            'value' => $postdata['value'],
            'remark' => $postdata['remark'],
            'group' => $postdata['group']
        );
        $res = $this->m_setting->addsetting($data);

        if ($res) {
            alert('添加成功', 'jump', '/systemsetting/');
        } else {
            alert('添加失败', 'jump', '/systemsetting/');
        }

    }


}