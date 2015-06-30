<?php

/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/31
 * Time: 15:18
 * desc:公告管理
 */
class news extends MY_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('m_news');

        $this->load->library('pager', array('instance' => 'p', 'perPage' => '20'));
    }

    function index()
    {
        $pageIndex = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
        $pageSize = 20;


        $data['content_text'] = 'news/news';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $pageList = $this->m_news->getlist($pageIndex, $pageSize);
        $data['list'] = $pageList['objlist'];
        $this->pager->set_total($pageList['count']);
        $actual_link = '?';
        $data['html'] = $this->pager->page_links($actual_link);

        $this->load->view('template', $data);
    }

    function edit()
    {
        $data['content_text'] = 'news/edit';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $data['model'] = $this->m_news->getModel($this->input->get('id'));

        $this->load->view('template', $data);
    }

    function updatepost()
    {
        $postData = $this->input->post();

        $isrecommend = null;
        $istop = null;
        if ($postData['opterStatus'] == '1') {
            $isrecommend = 1;
        }
        if ($postData['opterStatus'] == '2') {
            $istop = 1;
        }

        $data = array(
            'newstype' => $postData['newstype'],
            'newstitle' => $postData['newstitle'],
            'newscontent' => $postData['myEditor'],
            'addtime' => strtotime($postData['addtime']),
            'status' => 1,
            'isrecommend' => $isrecommend,
            'istop' => $istop
        );

        $res = $this->m_news->updateModel($postData['id'], $data);

        if ($res) {
            alert('修改成功', 'jump', '/news');
        } else {
            alert('修改失败', 'jump', '/news');
        }

    }

    /*
     * delete
     * */
    function deletebyid()
    {
        $id = $this->input->get('id');

        $res = $this->m_news->deletenews($id);

        if ($res) {
            alert('删除成功', 'jump', '/news');
        } else {
            alert('删除失败', 'jump', '/news');
        }
    }

    function add()
    {
        $data['content_text'] = 'news/add';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }

    function addpost()
    {
        $postData = $this->input->post();

        $isrecommend = null;
        $istop = null;
        if ($postData['opterStatus'] == '1') {
            $isrecommend = 1;
        }
        if ($postData['opterStatus'] == '2') {
            $istop = 1;
        }

        $data = array(
            'newstype' => $postData['newstype'],
            'newstitle' => $postData['newstitle'],
            'newscontent' => $postData['myEditor'],
            'addtime' => strtotime($postData['addtime']),
            'status' => 1,
            'isrecommend' => $isrecommend,
            'istop' => $istop
        );

        $res = $this->m_news->addnews($data);

        if ($res) {
            alert('添加成功', 'jump', '/news');
        } else {
            alert('添加失败', 'jump', '/news');
        }

    }
}