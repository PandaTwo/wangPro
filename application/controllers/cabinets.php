<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/30
 * Time: 18:43
 * desc:机柜管理
 */
class cabinets extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('m_cabinets');

    }

    function index()
    {
        $data['content_text'] = 'cabinets/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['sourceList'] = $this->m_cabinets->getall();

        $this->load->view('template', $data);
    }

    function add()
    {
        $data['content_text'] = 'cabinets/add';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }

    function addpost()
    {
        $postdata = $this->input->post();
        $data = array(
            'cabinetsNumber' => $postdata['cabinetsNumber'],
            'address' => $postdata['address'],
            'remark' => floatval($postdata['remark'])
        );
        $res = $this->m_cabinets->addcabinets($data);

        if ($res) {
            alert('添加成功', 'jump', '/cabinets/');
        } else {
            alert('添加失败','jump', '/cabinets/');
        }

    }
}