
<div class="content">
    <div class="header">
        <h1 class="page-title">修改会员资料</h1>
    </div>
    <div class="main-content">

        <div class="row">
            <div class="col-md-4">
                <br>
                <form id="tab" action="/member/editpost" enctype="multipart/form-data"  method="post">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="form-group">
                                <label>姓名</label>
                                <input name="username" type="text" value="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>姓别</label>
                                <select name="sex" class="form-control" required>
                                    <option value="男">男</option>
                                    <option value="女">女</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>套餐</label>
                                <select id="packageid" class="form-control" required>
                                    <?php foreach($packages as $rows): ?>
                                        <option value="<?php echo $rows['id']; ?>"><?php echo $rows['PackagesName']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>身份证号码</label>
                                <input name="cardid" type="text" value="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>手机</label>
                                <input name="phoneNumber" type="text" value="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>邮箱</label>
                                <input name="email" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>安装地址</label>
                                <input name="address" type="text" value="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>身份证正面图片</label>
                                <input name="image1" type="file" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>身份证背面图片</label>
                                <input name="image2" type="file" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> 保存并发送工单</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>
<script>
    $('#tab').validator();
</script>