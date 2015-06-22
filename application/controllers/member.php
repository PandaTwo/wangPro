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
        parent:: __construct();
        $this->load->model('m_packages');
        $this->load->model('m_members');

        $this->load->model('m_equipment');
        $this->load->model('m_cabinets');
        $this->load->library('pager', array('instance' => 'p', 'perPage' => '10'));
        $this->load->model('m_cityaddress');
        $this->load->model('m_orders');
        $this->load->library('smsservice');
        $this->load->library('mail');
    }

    function index()
    {
        $pageIndex = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
        $pageSize = 10;
        $searchKeywords = isset($_REQUEST['searchKeywords']) ? $_REQUEST['searchKeywords'] : '';

        $data['content_text'] = 'member/list';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $allmembers = $this->m_members->getallmembers($pageIndex, $pageSize, $searchKeywords);
        $data['sourceList'] = $this->m_members->getallmembers($pageIndex, $pageSize, $searchKeywords);

        $this->pager->set_total($allmembers['count']);

        $actual_link = '?';
        if ($searchKeywords) {
            $actual_link = "/member/?searchKeywords=" . $searchKeywords . '&';
        }


        $data['html'] = $this->pager->page_links($actual_link);

        $this->load->view('template', $data);
    }

    /*
     * 修改资料
     * */
    function edit()
    {
        $id = $this->input->get('id');

        $data['content_text'] = 'member/edit';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        $packagewhere = array(
            'status' => true
        );
        $data['packages'] = $this->m_packages->getwhere($packagewhere);

        $data['member'] = $this->m_members->getMemberByid($id);
        //$data['sourceList'] = $this->m_adminuser->getall();

        $this->load->view('template', $data);
    }

    function deletebyid()
    {
        $id = $this->input->get('id');
        $res = $this->m_members->deletebyid($id);

        if($res)
        {
            alert('删除成功','jump','/member/');
        }
        else{
            alert('删除失败','jump','/member/');
        }

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
        $data['firststepaddress'] = $this->m_cityaddress->getfiststepAll();

        $this->load->view('template', $data);
    }

    /*
     * 用户修改资料更新
     * */
    function editpost()
    {
        $postData = $this->input->post();

        $file1 = $postData['hidfile1'];
        $file2 = $postData['hidfile2'];

        if (!empty($_FILES['image1']['tmp_name'])) {
            $newfilename = date('Y-m-dHis') . '-0';
            $returnmsg = uploadfile('image1', $_SERVER['DOCUMENT_ROOT'] . '/static/uploads/', $newfilename);
            if ($returnmsg['status'] == 1) {
                $file1 = $returnmsg['msg'];
            } else {
                alert($returnmsg['msg']);
            }

        }

        if (!empty($_FILES['image2']['tmp_name'])) {
            $newfilename1 = date('Y-m-dHis') . '-1';
            $returnmsg1 = uploadfile('image2', $_SERVER['DOCUMENT_ROOT'] . '/static/uploads/', $newfilename1);
            if ($returnmsg1['status'] == 1) {
                $file2 = $returnmsg1['msg'];
            } else {
                alert($returnmsg1['msg']);
            }
        }

        $model = array(
            'username' => $postData['username'],
            'sex' => $postData['sex'],
            'cardid' => $postData['cardid'],
            'cardpic' => $file1,
            'cardpic1' => $file2,
            'phoneNumber' => $postData['phoneNumber'],
            'email' => $postData['email'],
            'address' => $postData['address'],
            'packageid' => $postData['packageid'],
            'updateName' => $this->adminName,
            'id' => $postData['id']
        );

        //print_r($model);

        $res = $this->m_members->updateMemberById($model);
        if ($res) {
            alert('修改资料成功','jump','/member/');
        } else {
            alert('修改资料失败','jump','/member/');
        }

    }

    /*
     * 添加用户登录信息
     * */
    function addregistration()
    {
        $postData = $this->input->post();
        if (!$postData) {
            alert('参数错误', 'jump', '/member/registraion');
        }

        $file1 = '';
        $file2 = '';

        $newfilename = date('Y-m-dHis') . '-0';
        $returnmsg = uploadfile('image1', $_SERVER['DOCUMENT_ROOT'] . '/static/uploads/', $newfilename);
        if ($returnmsg['status'] == 1) {
            $file1 = $returnmsg['msg'];
        } else {
            alert($returnmsg['msg']);
        }

        $newfilename1 = date('Y-m-dHis') . '-1';
        $returnmsg1 = uploadfile('image2', $_SERVER['DOCUMENT_ROOT'] . '/static/uploads/', $newfilename1);
        if ($returnmsg1['status'] == 1) {
            $file2 = $returnmsg1['msg'];
        } else {
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
            'address' => $postData['address'],
            'packageid' => $postData['packageid'],
            'updateName' => $this->adminName
        );

        $res = $this->m_members->addmembers($model);
        if ($res) {
            /*
             * 发送内容：姓名  身份证 地址  身份证相片正反面
             * */
            //请查阅邮箱，已将（陈某某）用户的开户资料发送传达，请及时开户。成功后将帐号密码回复邮件。
            //获取运营商邮箱和手机号码
            $operatoremail = $this->getsetting('operatoremail');
            $operatorphonenumber = $this->getsetting('operatorphonenumber');
            //获取用户信息
            $model = $this->m_members->getMemberByid($res);
            //发送短信
            $smscontent = '请查阅邮箱，已将（' . $model['username'] . '）用户的开户资料发送传达，请及时开户。成功后将帐号密码回复邮件。';
            $this->smsservice->sendmsg($operatorphonenumber, $smscontent, $model['id']);
            //发送邮件
            $this->mail->sendMail($operatoremail, $model['username'] . '开户资料', $this->regMailTemp($model));

            alert('登记成功.', 'jump', '/member/registraionlist');
        } else
            alert('登记失败.', 'jump', '/member/registraion');

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
            'id' => $postData['id'],
            'adsl_id' => $postData['adsl_id'],
            'adsl_pwd' => $postData['adsl_pwd'],
            'serviceSatus' => $postData['serviceSatus'],
            'packageid' => $postData['packageid'],
            'start_time' => strtotime($postData['start_time']),
            'end_time' => strtotime($postData['end_time']),
            'username' => $postData['username'],
            'sex' => $postData['sex'],
            'cardid' => $postData['cardid'],
            'phoneNumber' => $postData['phoneNumber'],
            'email' => $postData['email'],
            'equipmentid' => $postData['equipmentid'],
            'equipment_sn' => $postData['equipment_sn'],
            'address' => $postData['address'],
            'cabinetsid' => $postData['cabinetsid'],
        );

        $res = $this->m_members->updateMemberById($updateArray);

        if ($res) {
            //获取开户交费模板内容
            $package = $this->m_packages->getwhere(array('id' => $postData['packageid']));
            if ($package) {
                $postData['packagesName'] = $package[0]['PackagesName'];
                $postData['amount'] = $package[0]['Price'];
                $postData['amountcn'] = rmb_format(intval($package[0]['Price']));
                $postData['orderid'] = $this->getorderNumber();
                //添加记录到订单收费记录
                $orderarr = array(
                    'orderid' => $postData['orderid'],
                    'userid' => $updateArray['id'],
                    'type' => '交费',
                    'addTime' => time(),
                    'updateName' => 'admin'
                );
                $this->m_orders->addorders($orderarr);



                header('Location:/member/regmoneytemp?id=' . $updateArray['id'] . '&orderid=' . $postData['orderid'] . '&amount=' . $package[0]['Price'] . '&packagesName=' . $package[0]['PackagesName']);
                //$this->regmoneytemp($postData);

            }
        } else {
            alert('开户失败，请重新操作.', 'jump', '/member/registraionlist');
        }

    }

    function getorderNumber()
    {
        return date('YmdHis');
    }

    /*
     * 开户交费打印模板
     * */
    function regmoneytemp()
    {

        $getData = $this->input->get();

        $id = $getData['id'];
        $orderid = $getData['orderid'];
        $amountcn = rmb_format(intval($getData['amount']));

        $member = $this->m_members->getMemberByid($id);
        $order = $this->m_orders->getModelByOrderid($orderid);
        $member['amountcn'] = $amountcn;
        $data['data'] = array_merge($member, $order);

        $this->load->view('member/regmoneytemp', $data);
    }

    /*
     * 续费打单
     * */
    function renewals()
    {
        $id = $this->input->get('id');

        $data['content_text'] = 'member/renewals';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();
        //套餐
        $packagewhere = array(
            'status' => true
        );
        $data['packages'] = $this->m_packages->getwhere($packagewhere);
        $data['sourceModel'] = $this->m_members->getMemberByid($id);


        $this->load->view('template', $data);
    }


    function searchrenewals()
    {
        $getData = $this->input->get();

        $whereData = array(
            'username' => $getData['username'],
            'phoneNumber' => $getData['phoneNumber'],
            'adsl_id' => $getData['adsl_id']
        );

        $urlParams = '';
        foreach ($whereData as $key => $val) {
            $urlParams .= '&' . $key . '=' . $val;
        }
        $data['sourceModel'] = $this->m_members->searchrenewals($whereData);
        if ($data['sourceModel']) {
            alert('', 'jump', '/member/renewals?id=' . $data['sourceModel']['id'] . $urlParams);
        } else {
            alert('', 'jump', '/member/renewals?id=' . $urlParams);
        }
    }

    /*
     * 续费打单
     * */
    function postrenewals()
    {
        $postData = $this->input->post();

        $updateArray = array(
            'id' => $postData['id'],
            'adsl_id' => $postData['adsl_id'],
            'adsl_pwd' => $postData['adsl_pwd'],
            'serviceSatus' => $postData['serviceSatus'],
            'packageid' => $postData['packageid'],
            'start_time' => strtotime($postData['start_time']),
            'end_time' => strtotime($postData['end_time1']),
            'username' => $postData['username'],
            'sex' => $postData['sex'],
            'cardid' => $postData['cardid'],
            'phoneNumber' => $postData['phoneNumber'],
            'email' => $postData['email'],
            'address' => $postData['address'],
            'up_time' => time()
        );

        $res = $this->m_members->updateMemberById($updateArray);

        if ($res) {
            //获取续费模板内容
            $package = $this->m_packages->getwhere(array('id' => $postData['packageid']));
            if ($package) {
                $postData['packagesName'] = $package[0]['PackagesName'];
                $postData['amount'] = $package[0]['Price'];
                $postData['amountcn'] = rmb_format(intval($package[0]['Price']));
                $postData['orderid'] = $this->getorderNumber();
                //添加记录到订单收费记录
                $orderarr = array(
                    'orderid' => $postData['orderid'],
                    'userid' => $updateArray['id'],
                    'type' => '续费',
                    'addTime' => time(),
                    'updateName' => 'admin'
                );
                $this->m_orders->addorders($orderarr);

                /*
             * 发送内容：宽带账号 套餐 姓名 到期时间
             * */
                //请查阅邮箱，已将（陈某某）用户的续费资料发送传达，请及时续费。成功后将续费截图回复邮件。
                //获取运营商邮箱和手机号码
                $operatoremail = $this->getsetting('operatoremail');
                $operatorphonenumber = $this->getsetting('operatorphonenumber');
                //获取用户信息
                $model = $this->m_members->getMemberByid($res);
                $model['PackagesName'] = $package[0]['PackagesName'];
                //发送短信
                $smscontent = '请查阅邮箱，已将（' . $model['username'] . '）用户的续费资料发送传达，请及时续费。成功后将续费截图回复邮件。';
                $this->smsservice->sendmsg($operatorphonenumber, $smscontent, $model['id']);
                //发送邮件
                $this->mail->sendMail($operatoremail, $model['username'] . '开户资料', $this->renewalsMailTemp($model));

                //跳转到续费打单界面
                header('Location:/member/renewalstemp?id=' . $postData['id'] . '&orderid=' . $postData['orderid'] . '&amount=' . $package[0]['Price'] . '&packagesName=' . $postData['packagesName']);
                //$this->renewalstemp($postData);
            }
        } else {
            alert('续费失败，请重新操作.', 'jump', '/member/renewals');
        }
    }

    /*
     * 续费打单模板
     * */
    function renewalstemp()
    {
        $getData = $this->input->get();

        $id = $getData['id'];
        $orderid = $getData['orderid'];
        $amountcn = rmb_format(intval($getData['amount']));

        $member = $this->m_members->getMemberByid($id);
        $order = $this->m_orders->getModelByOrderid($orderid);
        $member['amountcn'] = $amountcn;
        $data['data'] = array_merge($member, $order);
        //print_r($data);
        $this->load->view('member/renewalstemp', $data);
    }


}