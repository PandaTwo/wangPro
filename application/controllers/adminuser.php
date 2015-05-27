<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/27
 * Time: 19:19
 */

class adminuser extends CI_Controller
{
    public $table_name = 'adminuser';
    function __construct()
    {
        parent :: __construct();
        $this->load->model('m_adminuser');
    }

    function index()
    {
        $data['content_text'] = 'adminuser/list';
        $data['show_menu'] = true;
        $data['userlist'] = $this->m_adminuser->getall();

        $this->load->view('template', $data);
    }

    function deletebyid()
    {
        $id = $this->input->get('id');
        if(!$id){alert('参数错误','jump','/adminuser/');}
        $res = $this->m_adminuser->deletebyid($id);
        if($res)
        {
            alert('删除成功','jump','/adminuser/');
        }else{
            alert('删除失败','jump','/adminuser/');
        }
    }

    function addpost($data = array())
    {
        $res  = $this->m_adminuser->add($data);
        if($res)
        {
            alert('添加成功','jump','/adminuser/');
        }else{
            alert('添加失败');
        }
    }

    function updatepost()
    {

    }
}