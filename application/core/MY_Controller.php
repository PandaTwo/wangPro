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
        parent:: __construct();
        header('Content-Type: text/html; charset=UTF-8');
        $this->checklogin();
        $this->load->model('m_setting');

    }

    /*
     * 验证用户是否登录
     * */
    function checklogin()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        //20分钟过期
        if( !isset( $_SESSION['authenticated'] ) || time() - $_SESSION['login_time'] > 1200) {
            unset($_SESSION["authenticated"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
            unset($_SESSION['adminUserName']);
            header('Location:/login/');
            //alert('', 'jump', '/login/');
        }
        if (!isset($_SESSION['authenticated'])) {
            header('Location:/login/');
            //alert('', 'jump', '/login/');
        }
        $this->adminName = $_SESSION['adminUserName'];
    }

    /*
     * 发送给运营商邮件模板内容
     * */
    function regMailTemp($model)
    {
        $baseFilePath = '/static/uploads/';
        $imghostpath = 'http://'.$_SERVER['HTTP_HOST'].$baseFilePath;

        $imgInfo = array();
        $imgInfo1 = array();

        //获取图片大小
        if(isset($model['cardpic']))
        {
            $imgInfo = getimagesize($baseFilePath.$model['cardpic']);
        }

        if(isset($model['cardpic1']))
        {
            $imgInfo1 = getimagesize($baseFilePath.$model['cardpic1']);
        }

        $htmltemp = '';
        $htmltemp .= '<table>';
        $htmltemp .= '<tr><td>姓名</td><td>' . $model['username'] . '</td></tr>';
        $htmltemp .= '<tr><td>身份证</td><td>' . $model['cardid'] . '</td></tr>';
        $htmltemp .= '<tr><td>地址</td><td>' . $model['address'] . '</td></tr>';

        if(count($imgInfo) > 0)
        {
            $htmltemp .= '<tr><td>身份证正面</td><td><img style="width:'.$imgInfo[0].'px;height: '.$imgInfo[0].'px" src="' .$imghostpath . $model['cardpic'] . '"></td></tr>';
        }
        if(count($imgInfo1) > 0)
        {
            $htmltemp .= '<tr><td>身份证反面</td><td><img style="width:'.$imgInfo1[0].'px;height: '.$imgInfo1[0].'px" src="' .$imghostpath . $model['cardpic1'] . '"></td></tr>';
        }
        //$htmltemp .= '<tr><td>身份证正面</td><td><a target="_blank" href="' .$imghostpath . $model['cardpic'] . '">点击查看</a></td></tr>';
        //$htmltemp .= '<tr><td>身份证反面</td><td><a target="_blank" href="' .$imghostpath . $model['cardpic1'] . '">点击查看</a></td></tr>';
        $htmltemp .= '</table>';

        return $htmltemp;
    }

    /*
     * 续费发给运营商的邮件模板
     * 宽带账号 套餐 姓名 到期时间
     * */
    function renewalsMailTemp($model)
    {
        $htmltemp = '';
        $htmltemp .= '<table>';
        $htmltemp .= '<tr><td>宽带账号</td><td>' . $model['adsl_id'] . '</td></tr>';
        $htmltemp .= '<tr><td>套餐</td><td>' . $model['PackagesName'] . '</td></tr>';
        $htmltemp .= '<tr><td>姓名</td><td>' . $model['username'] . '</td></tr>';
        $htmltemp .= '<tr><td>到期时间</td><td>' . date('Y-m-d',intval($model['end_time']))  . '</td></tr>';
        $htmltemp .= '</table>';

        return $htmltemp;
    }

    /*
     * 根据title获取配置value
     * */
    public function getsetting($title)
    {
        $res = $this->m_setting->getModelByName($title);
        if ($res) {
            return $res['value'];
        }

        return '';
    }
}