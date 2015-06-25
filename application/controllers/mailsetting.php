<?php

/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/31
 * Time: 14:38
 * desc:邮箱设置
 */
class mailsetting extends MY_Controller
{
    function __construct()
    {
        parent:: __construct();

        $this->load->model('m_setting');
        $this->load->library('mail');
    }

    function index()
    {
        $data['content_text'] = 'mailsetting/mail';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();

        $data['mailsetting'] = $this->m_setting->getAllByGroup('mail');

        $this->load->view('template', $data);

    }

    function getsettingval($title)
    {
        $arr = $this->m_setting->getModelByName($title);
        return $arr['value'];
    }

    function postmailsetting()
    {
        if (isset($_POST['sendtestmail'])) {
            //发送测试邮件
           $res = $this->mail->sendMail($this->getsettingval('testMail'),'test','test messages success.');
            if($res)
            {
                alert('邮件发送成功', 'jump', '/mailsetting/');
            }else{
                alert('邮件发送失败', 'jump', '/mailsetting/');
            }
        } else {

            $postdata = $this->input->post();
            foreach ($postdata as $key => $val) {
                $this->m_setting->updateModelByName($key, $val);
            }
            alert('修改成功', 'jump', '/mailsetting/');
        }
    }


}