<div class="content">
    <div class="header">
        <h1 class="page-title">邮箱设置</h1>
    </div>
    <div class="main-content">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">邮箱设置</a></li>
        </ul>
        <div class="row">
            <form id="tab" action="/mailsetting/postmailsetting" method="post">
                <div class="col-md-4">
                    <br>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="form-group">
                                <label>SMTP服务器</label>
                                <input name="smtpServer" type="text" value="<?php echo getval($mailsetting,'smtpServer'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>SMTP端口</label>
                                <input name="smtpProt" type="text" value="<?php echo getval($mailsetting,'smtpProt'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>邮箱账号</label>
                                <input name="mailName" type="text" value="<?php echo getval($mailsetting,'mailName'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>邮箱密码</label>
                                <input name="mailPwd" type="text" value="<?php echo getval($mailsetting,'mailPwd'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>测试邮件地址</label>
                                <input name="testMail" type="text" value="<?php echo getval($mailsetting,'testMail'); ?>" class="form-control">
                                <input type="submit" value="发送测试邮件" name="sendtestmail">
                            </div>
                            <div class="form-group">
                                <label>用户登记邮件标题</label>
                                <textarea name="regMailTitle"  class="form-control"><?php echo getval($mailsetting,'regMailTitle'); ?></textarea>

                            </div>
                            <div class="form-group">
                                <label>用户登记邮件内容</label>
                                <textarea name="regMailContent" cols="10" rows="10" class="form-control"><?php echo getval($mailsetting,'regMailContent'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>续费打单邮件标题</label>
                                <textarea name="renMailTitle" class="form-control"><?php echo getval($mailsetting,'renMailTitle'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>续费打单邮件内容</label>
                                <textarea name="renMailContent" cols="10" rows="10" class="form-control"><?php echo getval($mailsetting,'renMailContent'); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i
                                class="fa fa-save"></i> 保存
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
function getval($mailsetting,$title)
{
    foreach($mailsetting as $rows)
    {
        if($rows['title'] == $title)
        {
            return $rows['value'];
        }
    }
    return '';
}
?>
