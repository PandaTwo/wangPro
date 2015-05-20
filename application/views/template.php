<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/20
 * Time: 22:15
 */
$this->load->view('include/header');

$this->load->view('include/menu');
$this->load->view($content_text);
$this->load->view('include/footer');