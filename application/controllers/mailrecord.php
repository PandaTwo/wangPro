<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/21
 * Time: 11:30
 */
class mailrecord extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('m_emailrecord');
        $this->load->library('pager', array('instance' => 'p', 'perPage' => '20'));
        $this->load->library('mail');
    }

    /*
     * 重发邮件
     * */
    function resendmail()
    {
        $id = $this->input->get('id');
        $model = $this->m_emailrecord->getModel($id);
        //发送邮件
        $res = $this->mail->sendMail($model['emailaddress'],$model['title'],$model['content']);
        if($res)
        {
            alert('重发邮件成功','jump','/mailrecord/');
        }else{
            alert('重发邮件失败','jump','/mailrecord/');
        }
    }

    function delpost()
    {
        $ids = $_POST['item'];
        $arrLen = count($ids);
        for ($i = 0; $i < $arrLen; $i++) {
            //执行删除操作
            $this->m_emailrecord->deletebyid($ids[$i]);
        }
        alert('', 'jump', '/mailrecord/');
    }

    /*
     * 短信列表
     * */
    function index()
    {
        $pageIndex = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
        $pageSize = 20;

        $data['content_text'] = 'mailrecord/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $pageList = $this->m_emailrecord->getlist($pageIndex, $pageSize);
        $data['list'] = $pageList['objlist'];
        $this->pager->set_total($pageList['count']);
        $actual_link = '?';
        $data['html'] = $this->pager->page_links($actual_link);

        $this->load->view('template', $data);
    }
}