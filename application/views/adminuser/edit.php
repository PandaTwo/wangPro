<form id="tab" action="/adminuser/updatepost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">管理员密码修改</h1>
        </div>
        <div class="main-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">add</a></li>
            </ul>
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <input type="hidden" value="<?php echo $_REQUEST['id'] ?>" name="id">
                            <div class="form-group">
                                <label>用户名:</label>
                                <input name="username" id="username" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>旧密码:</label>
                                <input name="oldpassword" id="oldpassword" type="" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>密码:</label>
                                <input name="password" id="passwrod" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>确认密码:</label>
                                <input name="repassword" id="repassword" type="text" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> Edit</button>
                    </div>
                </div>
            </div>
            <?php
            $this->load->view('include/content_footer.html');
            ?>
        </div>
    </div>
</form>