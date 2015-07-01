<form action="/magic/postsendmsg" id="form1" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">发送短信至近7天过期的用户</h1>
        </div>
        <div class="main-content">
            <div class="btn-toolbar list-toolbar">
                <input type="submit" class="btn btn-primary" onclick="" value="确定发送">
                <div class="btn-group">
                </div>
            </div>
            <p>
                点击按钮后请等待页面跳转。。。
            </p>
            <?php
            $this->load->view('include/content_footer.html');
            ?>
        </div>
    </div>
</form>