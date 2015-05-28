<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/20
 * Time: 22:03
 */

class login extends CI_Controller
{
    function __construct()
    {
        parent :: __construct();

        $this->load->model('m_adminuser');
    }

    function index()
    {
        $data['content_text'] = 'login';
        $data['show_menu'] = false;
        $this->load->view('template',$data);
    }

    /*
     * 退出登录
     * */
    function logout()
    {
        session_start();
        unset($_SESSION["authenticated"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
        unset($_SESSION['adminUserName']);

        header("Location: /login/");
    }


    function loginPost()
    {
        $postData = $this->input->post();

        $username = $postData['username'];
        $password = $postData['password'];

        if(empty($username))
        {
            alert('用户名不能为空','jump','/');
        }
        if(empty($password))
        {
            alert('用户名或密码错误','jump','/');
        }

        $res = $this->m_adminuser->checkuserlogin($username,$password);
        if($res)
        {
            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['adminUserName'] = $username;

            alert('','jump','/');
        }else
        {
            alert('用户名或密码错误','jump','/login');
        }

    }
}