<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/30
 * Time: 21:33
 * desc:设备管理
 */

class equipment extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('m_equipment');
    }

    function edit()
    {
        $id = $this->input->get('id');

        $data['content_text'] = 'equipment/edit';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['updateModel'] = $this->m_equipment->getModel($id);

        $this->load->view('template', $data);
    }

    function updatePost()
    {
        $postdata = $this->input->post();

        $id = $postdata['id'];
        $data = array(
            'equipmentName' => $postdata['equipmentName'],
            'company' => $postdata['company'],
            'price' => floatval($postdata['price']),
            'model' => $postdata['model'],
            'status' => isset($postdata['status']) ? 1 : 0,
            'updateName' => 'admin'
        );

        $res = $this->m_equipment->updateModel($id,$data);
        if ($res) {
            alert('修改成功', 'jump', '/equipment/');
        } else {
            alert('修改失败', 'jump', '/equipment/');
        }
    }

    function deletebyid()
    {
        $id = $this->input->get('id');
        if (!$id) {
            alert('参数错误','jump', '/equipment/');
        }
        $res = $this->m_equipment->deleteequipment($id);
        if ($res) {
            alert('删除成功', 'jump', '/equipment/');
        } else {
            alert('删除失败','jump', '/equipment/');
        }
    }

    function index()
    {
        $data['content_text'] = 'equipment/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['sourceList'] = $this->m_equipment->getall();

        $this->load->view('template', $data);
    }

    function add()
    {
        $data['content_text'] = 'equipment/add';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }

    function addpost()
    {
        $postdata = $this->input->post();
        $data = array(
            'equipmentName' => $postdata['equipmentName'],
            'company' => $postdata['company'],
            'price' => floatval($postdata['price']),
            'model' => $postdata['model'],
            'status' => isset($postdata['status']) ? 1 : 0,
            'updateName' => 'admin'
        );
        $res = $this->m_equipment->addequipment($data);

        if ($res) {
            alert('添加成功', 'jump', '/equipment/');
        } else {
            alert('添加失败','jump', '/equipment/');
        }

    }


}