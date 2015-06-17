<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/16
 * Time: 0:55
 */

class sms extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();

        $this->load->model('m_setting');
        $this->load->library('smsservice');
        $this->load->model('m_smsrecord');
        $this->load->library('pager',array('instance'=>'p','perPage'=>'20'));
    }

    /*
     * 短信列表
     * */
    function index()
    {
        $pageIndex = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
        $pageSize = 20;

        $data['content_text'] = 'sms/smslist';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $pageList = $this->m_smsrecord->getlist($pageIndex,$pageSize);
        $data['list'] = $pageList['objlist'];
        $this->pager->set_total($pageList['count']);
        $actual_link = '?';
        $data['html'] =$this->pager->page_links($actual_link);

        $this->load->view('template', $data);
    }

    /*
     * 删除记录项
     * */
    function delsmspost()
    {
        $ids = $_POST['item'];
        $arrLen = count($ids);
        for($i = 0 ;$i<$arrLen;$i++)
        {
            //执行删除操作
            $this->m_smsrecord->deletebyid($ids[$i]);
        }

        alert('','jump','/sms/');
    }

    /*
     * 发送短信
     * */
    function sendsms()
    {
        $data['content_text'] = 'sms/sendmsg';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $this->load->view('template', $data);
    }

    /*
     * 短信设置
     * */
    function smssetting()
    {
        $data['content_text'] = 'sms/smssetting';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $data['smssetting'] = $this->m_setting->getAllByGroup('sms');

        $this->load->view('template', $data);
    }

    function postsmssetting()
    {
        $postdata = $this->input->post();
        foreach($postdata as $key=>$val)
        {
            $this->m_setting->updateModelByName($key,$val);
        }
        alert('修改成功','jump','/sms/smssetting');
    }

    /*
     * 发送测试短信
     * */
    function postsendtestsms()
    {
        $postdata = $this->input->post();
        foreach($postdata as $key=>$val)
        {
            $this->m_setting->updateModelByName($key,$val);
        }
        //发送短信
        $this->smsservice->testsendmsg($this->getsetting('smstestphonenumber'),$this->getsetting('smstestcontent'));
        alert('短信已发送','jump','/sms/smssetting');
    }
}