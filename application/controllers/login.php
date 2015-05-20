<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/20
 * Time: 22:03
 */

class login extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
    }

    function index()
    {
        $data['content_text'] = 'login';

        $this->load->view('template',$data);
    }
}