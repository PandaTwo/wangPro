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
        $this->load->model('m_cityaddress');

    }

    function ajaxgetlistbyclassid()
    {
        $class_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $res = $this->m_cityaddress->getlistbywhere(array('class_parent_id'=>$class_id));
        echo json_encode($res);
    }

    function index()
    {
        $pid = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : '';
        $data['content_text'] = 'address/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $data['sourceList'] = $this->m_cityaddress->getfiststepAll();
        if($pid)
        {
            $where = array('class_parent_id'=>$pid);
            $data['sourceList'] = $this->m_cityaddress->getlistbywhere($where);
        }

        $this->load->view('template', $data);
    }

    function add()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $class_type = isset($_REQUEST['class_type']) ? $_REQUEST['class_type'] : '';


        $data['content_text'] = 'address/add';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $data['model'] = $this->m_cityaddress->getModel($id);

        $this->load->view('template', $data);
    }

    function addpost()
    {
        $postData = $this->input->post();
        $data = array(
            'class_parent_id' => $postData['class_parent_id'],
            'class_name' => $postData['class_name'],
            'class_type' => intval($postData['class_type'])  + 1
        );
        $res = $this->m_cityaddress->addcityaddress($data);
        if ($res) {
            alert('添加成功', 'jump', '/address/');
        } else {
            exit('添加失败');
        }

    }

    function edit()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $data['content_text'] = 'address/edit';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $data['model'] = $this->m_cityaddress->getModel($id);

        $this->load->view('template', $data);
    }

    function editPost()
    {
        $postData = $this->input->post();

        $id = $postData['class_id'];
        $data = array(
            'class_parent_id' => $postData['class_parent_id'],
            'class_name' => $postData['class_name'],
            'class_type' => intval($postData['class_type'])
        );

        $res = $this->m_cityaddress->updateModel($id,$data);
        if ($res) {
            alert('修改成功', 'jump', '/address/');
        } else {
            exit('修改失败');
        }
    }
}