<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/20
 * Time: 22:04
 */

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent :: __construct();
        header("content-text:html/text;charset='utf-8'");
        $this->checklogin();

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
    }
}