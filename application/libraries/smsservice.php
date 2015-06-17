<?php

/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/6/16
 * Time: 22:36
 */
class smsservice
{
    private $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();

        $this->CI->load->model('m_setting');
        $this->CI->load->model('m_smsrecord');
    }

    function smsserver($mobile,$content)
    {
        $flag = 0;
        $params='';//要post的数据

        //以下信息自己填以下
        $mobile='';//手机号
        $argv = array(
            'name'=>$this->CI->m_setting->getModelByName('smsname'),     //必填参数。用户账号
            'pwd'=>$this->CI->m_setting->getModelByName('smspwd'),     //必填参数。（web平台：基本资料中的接口密码）
            'content'=>$content,   //必填参数。发送内容（1-500 个汉字）UTF-8编码
            'mobile'=>$mobile,   //必填参数。手机号码。多个以英文逗号隔开
            'stime'=>'',   //可选参数。发送时间，填写时已填写的时间发送，不填时为当前时间发送
            'sign'=>$this->CI->m_setting->getModelByName('smssign'),    //必填参数。用户签名。
            'type'=>'pt',  //必填参数。固定值 pt
            'extno'=>''    //可选参数，扩展码，用户定义扩展码，只能为数字
        );
        //print_r($argv);exit;
        //构造要post的字符串
        //echo $argv['content'];
        foreach ($argv as $key=>$value) {
            if ($flag!=0) {
                $params .= "&";
                $flag = 1;
            }
            $params.= $key."="; $params.= urlencode($value);// urlencode($value);
            $flag = 1;
        }
        $url = $this->CI->m_setting->getModelByName('smsserverurl')."?".$params; //提交的url地址
        $con= substr(file_get_contents($url), 0, 1);  //获取信息发送后的状态

        if($con == '0'){
            return true;
        }else{
            echo false;
        }
    }

    function testsendmsg($phonenumber,$msg)
    {
        $this->smsserver($phonenumber,$msg);
    }

    /*
     * 发送短信
     * */
    function sendmsg($phonenumber,$msg,$userid)
    {
        //替换模板里面的内容
        $res = $this->smsserver($phonenumber,$msg);
        if($res)
        {
            $data = array(
                'userid' => $userid,
                'status'=>'成功',
                'sendtime'=>time(),
                'smscontent'=>$msg
            );
            $this->CI->m_smsrecord->insertsmsrecord($data);
        }else{
            $data = array(
                'userid' => $userid,
                'status'=>'成功',
                'sendtime'=>time(),
                'smscontent'=>$msg
            );
            $this->CI->m_smsrecord->insertsmsrecord($data);
        }
    }


}