<?php

/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/25
 * Time: 21:42
 */
class packages extends MY_Controller
{
    function __construct()
    {
        parent:: __construct();


        $this->load->model('m_packages');
    }

    function index()
    {
        $data['content_text'] = 'packages/list';
        $data['show_menu'] = true;
        $data['packlist'] = $this->m_packages->getall();

        $this->load->view('template', $data);
    }


    function deletebyid()
    {
        $id = $this->input->get('id');
        if (!$id) {
            alert('参数错误','jump', '/packages/');
        }
        $res = $this->m_packages->deletePackages($id);
        if ($res) {
            alert('删除成功', 'jump', '/packages/');
        } else {
            alert('删除失败','jump', '/packages/');
        }

    }

    function add()
    {
        $data['content_text'] = 'packages/add';
        $data['show_menu'] = true;


        $this->load->view('template', $data);
    }

    function addpost()
    {
        $postdata = $this->input->post();


        $data = array(
            'PackagesName' => $postdata['PackagesName'],
            'Speed' => $postdata['Speed'],
            'Price' => floatval($postdata['Price']),
            'times' => $postdata['times'],
            'status' => isset($postdata['status']) ? 1 : 0,
            'UpdateName' => 'admin'
        );
        $res = $this->m_packages->addPackages($data);

        if ($res) {
            alert('添加成功', 'jump', '/packages/');
        } else {
            alert('添加失败');
        }

    }
}