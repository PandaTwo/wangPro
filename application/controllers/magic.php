<?php

/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/7/1
 * Time: 17:07
 */
class magic extends MY_Controller
{
    function __construct()
    {
        parent:: __construct();

        $this->load->model('m_members');
        $this->load->library('smsservice');

        $this->load->model('m_setting');
    }


    function index()
    {
        if(isset($_REQUEST['t']) && isset($_REQUEST['send']))
        {
            $data['msg'] = '宽带到期用户-'.$_REQUEST['t'].'个,提醒用户短信条数：'.$_REQUEST['send'];
        }

        $data['lastCheckMagic'] = $this->getsetting('lastCheckMagic');
        $data['content_text'] = 'magic/sendmsg';
        $data['show_menu'] = true;
        $data['menu'] = $this->m_adminmenu->selectWhere();



        $this->load->view('template', $data);
    }


    function postsendmsg()
    {
        //获取最近7天到期用户列表
        $results = $this->m_members->getAll();

        $nowTime = time();
        $t = 0;
        $sendCount = 0;
        foreach ($results as $rows) {
            if (isset($rows['end_time'])) {
                //已经到期
                if ($nowTime > $rows['end_time'] && (($nowTime - $rows['end_time']) / (3600 * 24)) > 0) {

                    if ($rows['serviceSatus'] != '到期') {
                        //设置为已过期
                        $updatearr = array(
                            'id' => $rows['id'],
                            'serviceSatus' => '到期'
                        );
                        $this->m_members->updateMemberById($updatearr);
                        $t++;

                    }

                }

                //如果是七天内就要过期则发送短信提醒用户
                if ($nowTime < $rows['end_time'] && (($rows['end_time'] - $nowTime) / 3600 * 24) <= 7) {
                    $msg = '尊敬的（'.$rows['username'].'）用户您好，您的宽带将在（'.date('Y-m-d',intval($rows['end_time'])).'）到期，为不影响您的上网请及时到上陈有线电视收费网点续费。';
                    //发送短信
                    $this->smsservice->sendmsg($rows['phoneNumber'], $msg, $rows['id']);
                    $sendCount++;
                }

            }


        }

        //修改状态表示今天已经更新
        $this->m_setting->updateModelByName('lastCheckMagic',time());

        header('Location:/magic?t='.$t.'&send='.$sendCount);

    }


}