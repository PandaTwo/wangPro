<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/27
 * Time: 19:19
 */

class adminuser extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('m_adminuser');
    }

    function index()
    {
        $data['content_text'] = 'adminuser/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['sourceList'] = $this->m_adminuser->getall();

        $this->load->view('template', $data);
    }



    function edit()
    {
        $id = $this->input->get('id');

        $data['content_text'] = 'adminuser/edit';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['model'] = $this->m_adminuser->getbyid($id);

        $this->load->view('template', $data);
    }

    function updatepost()
    {
        $postData = $this->input->post();
        $id = $postData['id'];

        if(!$postData){die('数据错误');}

        $data = array(
            'username' => $postData['username'],
            'password' => $postData['password'],
            'createdOn' => time(),
            'role' => 1,
        );

        $res = $this->m_adminuser->updateadminuser($id,$data);
        if($res)
        {
            alert('修改成功','jump','/adminuser/');
        }else{
            alert('修改失败','jump','/adminuser/');
        }
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

    function addpost()
    {
        $postData = $this->input->post();
        if($postData)
        {
            $data = array(
                'username' => $postData['username'],
                'password' => $postData['password'],
                'createdOn' => time(),
                'role' => 1,
            );
            $res  = $this->m_adminuser->addadminuser($data);
            if($res)
            {
                alert('添加成功','jump','/adminuser/');
            }else{
                alert('添加失败','jump','/adminuser/');
            }
        }

    }

}