
<div class="content">
    <div class="header">
        <h1 class="page-title">修改会员资料</h1>
    </div>
    <div class="main-content">

        <div class="row">
            <div class="col-md-4">
                <br>
                <form id="tab" action="/member/editpost" enctype="multipart/form-data"  method="post">
                    <input type="hidden" name="id" value="<?php echo $member['id'] ?>">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="form-group">
                                <label>姓名</label>
                                <input name="username" type="text" value="<?php echo $member['username'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>姓别</label>
                                <select name="sex" class="form-control" required>
                                    <option <?php echo $member['sex'] == '男' ? 'selected' :'' ?> value="男">男</option>
                                    <option <?php echo $member['sex'] == '女' ? 'selected' :'' ?> value="女">女</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>套餐</label>
                                <select id="packageid" name="packageid" class="form-control" required>
                                    <?php foreach($packages as $rows): ?>
                                        <option <?php echo $rows['id'] == $member['packageid'] ? 'selected' :'' ?> value="<?php echo $rows['id']; ?>"><?php echo $rows['PackagesName']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>身份证号码</label>
                                <input name="cardid" type="text" value="<?php echo $member['cardid'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>手机</label>
                                <input name="phoneNumber" type="text" value="<?php echo $member['phoneNumber'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>邮箱</label>
                                <input name="email" type="text" value="<?php echo $member['email'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>安装地址</label>
                                <input name="address" type="text" value="<?php echo $member['address'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>身份证正面图片</label>
                                <input type="hidden" name="hidfile1" value="<?php echo $member['cardpic'] ?>" >
                                <a href="/static/uploads/<?php echo $member['cardpic'] ?>" target="_blank"><img src="/static/uploads/<?php echo $member['cardpic'] ?>" style="width:300px;height: 150px;"></a>
                                <input name="image1" type="file" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>身份证背面图片</label>
                                <input type="hidden" name="hidfile2" value="<?php echo $member['cardpic1'] ?>" >
                                <a href="/static/uploads/<?php echo $member['cardpic1'] ?>" target="_blank"><img src="/static/uploads/<?php echo $member['cardpic1'] ?>" style="width:300px;height: 150px;"></a>
                                <input name="image2" type="file" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> 保存更新</button>
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