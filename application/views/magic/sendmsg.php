<form action="/magic/postsendmsg" id="form1" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">发送短信至近7天过期的用户</h1>
        </div>
        <div class="main-content">
            <div class="btn-toolbar list-toolbar">
                <?php if(date('Y-m-d',time()) != date('Y-m-d',$lastCheckMagic)){ ?>
                <input type="submit" class="btn btn-primary" value="确定发送">
                <?php }else{?>
                <p>
                    今天已经检查完成。
                </p>
                <?php }  ?>
                <div class="btn-group">
                </div>
            </div>
            <p>
                <?php echo isset($msg) ? $msg : '点击按钮后请等待页面跳转。。。'; ?>
            </p>
            <?php
            $this->load->view('include/content_footer.html');
            ?>
        </div>
    </div>
</form>