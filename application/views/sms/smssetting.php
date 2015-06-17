<div class="content">
    <div class="header">
        <h1 class="page-title">短信设置</h1>
    </div>
    <div class="main-content">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">短信设置</a></li>
        </ul>
        <div class="row">
            <form id="tab" action="/sms/postsmssetting" method="post">
                <div class="col-md-4">
                    <br>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="form-group">
                                <label>SMS服务URL</label>
                                <input name="smsserverurl" type="text" value="<?php echo getval($smssetting,'smsserverurl'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>用户名</label>
                                <input name="smsname" type="text" value="<?php echo getval($smssetting,'smsname'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>密码</label>
                                <input name="smspwd" type="text" value="<?php echo getval($smssetting,'smspwd'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>密钥</label>
                                <input name="smssign" type="text" value="<?php echo getval($smssetting,'smssign'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>短信后缀</label>
                                <input name="smssuffix" type="text" value="<?php echo getval($smssetting,'smssuffix'); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i
                                class="fa fa-save"></i> 保存
                        </button>
                    </div>
            </form>

            <form id="tab1" action="/sms/postsendtestsms" method="post">
                <div class="tab-pane active" id="home">
                    <div class="form-group">
                        <label>测试内容</label>
                        <input name="smstestcontent" type="text" value="<?php echo getval($smssetting,'smstestcontent'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>测试手机号码</label>
                        <input name="smstestphonenumber" type="text" value="<?php echo getval($smssetting,'smstestphonenumber'); ?>" class="form-control">
                    </div>
                </div>
                <div class="btn-toolbar list-toolbar">
                    <button onclick='document.getElementById("tab1").submit();' class="btn btn-primary"><i
                            class="fa fa-save"></i> 发送
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php
    $this->load->view('include/content_footer.html');
    ?>
</div>
</div>

<?php
    function getval($smssetting,$title)
    {
        foreach($smssetting as $rows)
        {
            if($rows['title'] == $title)
            {
                return $rows['value'];
            }
        }
        return '';
    }
?>
