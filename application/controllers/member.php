<?php
/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/5/28
 * Time: 11:35
 */

class member extends MY_Controller
{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('m_packages');
        $this->load->model('m_members');

        $this->load->model('m_equipment');
        $this->load->model('m_cabinets');
    }

    function index()
    {

        $pageIndex = 1;
        $pageSize = 10;

        $data['content_text'] = 'member/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['sourceList'] = $this->m_members->getallmembers($pageIndex,$pageSize);

        $this->load->view('template', $data);
    }

    /*
     * 修改资料
     * */
    function edit()
    {
        $data['content_text'] = 'member/edit';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $packagewhere = array(
            'status' => true
        );
        $data['packages'] = $this->m_packages->getwhere($packagewhere);
        //$data['sourceList'] = $this->m_adminuser->getall();

        $this->load->view('template', $data);
    }

    /*
     * 用户登记
     * */
    function registraion()
    {
        $data['content_text'] = 'member/registraion';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $packagewhere = array(
            'status' => true
        );
        $data['packages'] = $this->m_packages->getwhere($packagewhere);

        $this->load->view('template', $data);
    }

    /*
     * 添加用户登录信息
     * */
    function addregistration()
    {
        $postData = $this->input->post();
        if(!$postData) {
            alert('参数错误','jump','/member/registraion');
        }

        $file1='';
        $file2='';

            $newfilename = date('Y-m-dHis').'-0';
            $returnmsg = uploadfile('image1','D:/PHPWork/wangPro/static/uploads/',$newfilename);
            if($returnmsg['status']==1)
            {
                $file1 = $returnmsg['msg'];
            }
            else{
                alert($returnmsg['msg']);
            }

            $newfilename1 = date('Y-m-dHis').'-1';
            $returnmsg1 = uploadfile('image2','D:/PHPWork/wangPro/static/uploads/',$newfilename1);
            if($returnmsg1['status']==1)
            {
                $file2 = $returnmsg1['msg'];
            }
            else{
                alert($returnmsg1['msg']);
            }
        $model = array(
            'username' => $postData['username'],
            'sex' => $postData['sex'],
            'cardid' => $postData['cardid'],
            'cardpic' => $file1,
            'cardpic1' => $file2,
            'phoneNumber' => $postData['phoneNumber'],
            'email' => $postData['email'],
            'address'=>$postData['address'],
            'packageid'=>$postData['packageid'],
            'updateName'=> $this->adminName
        );

        $res = $this->m_members->addmembers($model);
        if($res)
        {
            alert('登记成功.','jump','/member/registraionlist');
        }else
            alert('登记失败.','jump','/member/registraion');

    }



    /*
     * 登记列表
     * */
    function registraionlist()
    {
        $data['content_text'] = 'member/registraionlist';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $data['sourceList'] = $this->m_members->memberRegistraionList();

        $this->load->view('template', $data);
    }

    /*
     * 开户交费页面
     * */
    function registrationMoeny()
    {
        $id = $this->input->get('id');

        $data['content_text'] = 'member/registraionmoney';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        //套餐
        $packagewhere = array(
            'status' => true
        );
        $data['packages'] = $this->m_packages->getwhere($packagewhere);
        //设备
        $equipmentwhere = array(
            'status' => true
        );
        $data['equipments'] = $this->m_equipment->getallbywhere($equipmentwhere);
        //机柜
        $data['cabinets'] = $this->m_cabinets->getAll();
        $data['sourceModel'] = $this->m_members->getMemberByid($id);

        $this->load->view('template', $data);
    }

    /*
     * 开户交费提交界面
     * */
    function addregistraionmoney()
    {
        $postData = $this->input->post();

        $updateArray = array(
            'id'=>$postData['id'],
            'adsl_id'=>$postData['adsl_id'],
            'adsl_pwd'=>$postData['adsl_pwd'],
            'serviceSatus'=>$postData['serviceSatus'],
            'packageid'=>$postData['packageid'],
            'start_time'=>strtotime($postData['start_time']),
            'end_time'=>strtotime($postData['end_time']),
            'username'=>$postData['username'],
            'sex'=>$postData['sex'],
            'cardid'=>$postData['cardid'],
            'phoneNumber'=>$postData['phoneNumber'],
            'email'=>$postData['email'],
            'equipmentid'=>$postData['equipmentid'],
            'equipment_sn'=>$postData['equipment_sn'],
            'address'=>$postData['address'],
            'cabinetsid'=>$postData['cabinetsid'],
        );

        $res = $this->m_members->updateMemberById($updateArray);

        if($res) {
            //获取开户交费模板内容
            $package = $this->m_packages->getwhere(array('id' => $postData['packageid']));
            if ($package)
            {
                $postData['packagesName'] = $package[0]['PackagesName'];
                $postData['amount'] = $package[0]['Price'];
                $postData['amountcn'] =rmb_format(intval($package[0]['Price']));
                $postData['orderid'] = $this->getorderNumber();
                $this->regmoneytemp($postData);

            }
        }
        else{
            alert('开户失败，请重新操作.','jump','/member/registraionlist');
        }

    }

    function getorderNumber()
    {
        return date('YmdHis');
    }

    /*
     * 开户交费打印模板
     * */
    function regmoneytemp($dataarr = array())
    {
        $data['data'] = $dataarr;
        $this->load->view('member/regmoneytemp',$data);
    }

    /*
     * 续费打单
     * */
    function renewals()
    {
        $data['content_text'] = 'member/renewals';
        $data['show_menu'] = true;
        $data['menu'] = 'include/menu';

        $this->load->view('template', $data);
    }

    /*
     * 续费打单模板
     * */
    function renewalstemp()
    {
        $this->load->view('member/renewalstemp');
    }


}