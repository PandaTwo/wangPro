<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/17
 * Time: 21:33
 */
class mail
{
    private $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->model('m_setting');
        $this->CI->load->model('m_emailrecord');
    }

    function getsettingval($title)
    {
        $arr = $this->CI->m_setting->getModelByName($title);
        return $arr['value'];
    }

    function sendMail($mailto,$title,$content)
    {
        $pieces = explode("@", $this->getsettingval('mailName'));
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $this->getsettingval('smtpServer');
        $config['smtp_user'] = $this->getsettingval('mailName');
        $config['smtp_pass'] = $this->getsettingval('mailPwd');
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['smtp_port'] = $this->getsettingval('smtpProt');
        //$config['newline'] = "\r\n";
        //$config['crlf'] = "\r\n";



        //$subject = '=?uft-8?B?'. base64_encode($title) .'?=';

        $this->CI->load->library('email');
        $this->CI->email->initialize($config);
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->from($this->getsettingval('mailName')); // change it to yours
        $this->CI->email->to($mailto);// change it to yours
        $this->CI->email->subject($title);
        $this->CI->email->message($content);

        if($this->CI->email->send())
        {
            $mailrecord = array(
                'emailaddress'=>$mailto,
                'content' =>$content,
                'title' =>$title,
                'addtime' =>time(),
                'status'=>'成功'
            );
            $this->CI->m_emailrecord->insertemailrecord($mailrecord);
            return true;
        }
        else
        {
            $mailrecord = array(
                'emailaddress'=>$mailto,
                'content' =>$content,
                'title' =>$title,
                'addtime' =>time(),
                'status'=>'失败'
            );
            $this->CI->m_emailrecord->insertemailrecord($mailrecord);
            //echo $this->CI->email->print_debugger();
            return false;
        }

    }
}