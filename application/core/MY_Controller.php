<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/20
 * Time: 22:04
 */

class MY_Controller extends CI_Controller
{
    public $adminName = "";
    function __construct()
    {
        parent :: __construct();
        header('Content-Type: text/html; charset=UTF-8');
        $this->checklogin();
        $this->load->model('m_setting');

    }

    /*
     * 验证用户是否登录
     * */
    function checklogin()
    {
        session_start();
        if(!isset($_SESSION['authenticated']))
        {
            alert('','jump','/login/');
        }
        $this->adminName = $_SESSION['adminUserName'];
    }

    /*
     * 根据title获取配置value
     * */
    public function getsetting($title)
    {
        $res = $this->m_setting->getModelByName($title);
        if($res)
        {
            return $res['value'];
        }

        return '';
    }
}