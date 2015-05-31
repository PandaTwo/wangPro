<?php
/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/5/28
 * Time: 14:59
 */

class adminmenu extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();

        $this->load->model('m_adminmenu');
    }

    function index()
    {
        $data['content_text'] = 'menu/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }

    function deletebyid()
    {
        $id = $this->input->get('id');
        if(!$id) die('参数错误');

        $res = $this->m_adminmenu->deletebyid($id);

        if($res)
        {
            alert('删除成功','jump','/adminmenu/');
        }else
            alert('删除失败','jump','/adminmenu/');
    }

    function add()
    {
        $data['content_text'] = 'menu/add';
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['show_menu'] = true;
        $whereData = array(
            'parentId'=>0
        );
        //获取所有一级菜单
        $data['root_menu'] = $this->m_adminmenu->selectWhere($whereData);

        $this->load->view('template', $data);
    }

    function addpost()
    {
        $postData = $this->input->post();
        if(!$postData)
        {
            exit('参数错误');
        }
        $data = array(
            'menuName'=>$postData['menuName'],
            'parentId'=>$postData['parentId'],
            'URL'=>$postData['URL'],
            'sort'=>$postData['sort'],
            'isshow'=>isset($postData['isshow']) ? true : false
        );

        $res = $this->m_adminmenu->addadminmenu($data);
        if($res)
        {
            alert('添加成功','jump','/adminmenu/add');
        }else{
            alert('添加失败','jump','/adminmenu/add');
        }

    }


}