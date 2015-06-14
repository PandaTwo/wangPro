<?php
/**
 * Created by PhpStorm.
 * User: Pandait
 * Date: 2015/5/31
 * Time: 15:12
 * desc:收费记录
 */
class payrecord extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('m_orders');
        $this->load->library('pager',array('instance'=>'p','perPage'=>'10'));
    }

    function index()
    {
        $pageIndex = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
        $pageSize = 10;

        $where = $this->input->get();

        $data['content_text'] = 'payrecord/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $pageobj = $this->m_orders->searchorders($where,$pageIndex,$pageSize);

        $data['objSource'] = $pageobj['objlist'];
        $this->pager->set_total($pageobj['count']);
        $actual_link = '?';
        if($where)
        {
            $urlparams = '';
            foreach($where as $key=>$val)
            {
                if(!empty($val) && $key != 'p')
                {
                  $urlparams.=$key.'='.$val.'&';
                }
            }

            $actual_link = "/payrecord/?".$urlparams;
        }
        $data['html'] =$this->pager->page_links($actual_link);

        $this->load->view('template', $data);
    }
}