<form id="tab" action="/packages/addpost" method="post">
    <div class="content">
        <div class="header">

            <h1 class="page-title">add 套餐</h1>
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a> </li>
                <li><a href="users.html">套餐</a> </li>
                <li class="active">add</li>
            </ul>

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

                            <div class="form-group">
                                <label>用户名:</label>
                                <input name="username" id="username" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>旧密码:</label>
                                <input name="password" id="passwrod" type="password" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>密码:</label>
                                <input name="password" id="passwrod" type="password" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>确认密码:</label>
                                <input name="repassword" id="repassword" type="password" value="" class="form-control">
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