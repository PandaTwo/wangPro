
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
                                <label>设备名称</label>
                                <select id="equipmentid" name="equipmentid" class="form-control">
                                    <?php foreach($equipments as $rows): ?>
                                        <option <?php echo $rows['id'] == $member['equipmentid'] ? 'selected' :'' ?> value="<?php echo $rows['id']; ?>"><?php echo $rows['equipmentName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>设备序号</label>
                                <input name="equipment_sn" type="text" value="<?php echo $member['equipment_sn'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>宽带账号</label>
                                <input name="adsl_id" type="text" value="<?php echo $member['adsl_id'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>宽带密码</label>
                                <input name="adsl_pwd" type="text" value="<?php echo $member['adsl_pwd'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>服务状态</label>
                                <select name="serviceSatus" class="form-control">
                                    <option <?php echo $member['serviceSatus']=='正常'?'selected':'' ?> value="正常">正常</option>
                                    <option <?php echo $member['serviceSatus']=='暂停'?'selected':'' ?> value="暂停">暂停</option>
                                    <option <?php echo $member['serviceSatus']=='到期'?'selected':'' ?> value="到期">到期</option>
                                </select>
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
                            <?php
                            $cityarr = explode(',',$member['cityid']);
                            ?>
                            <div class="form-group">
                                <label>安装地址</label>
                                <select id="sheng" name="sheng">
                                    <option value="0">==请选择==</option>
                                    <?php foreach($sheng as $row): ?>
                                        <option <?php echo $row['class_id'] == $cityarr[0] ? 'selected' : '' ?> value="<?php echo $row['class_id'];?>"><?php echo $row['class_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select id="shi" name="shi">
                                    <option>==请选择==</option>
                                    <?php foreach($shi as $row): ?>
                                        <option <?php echo $row['class_id'] == $cityarr[1] ? 'selected' : '' ?> value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select id="xian" name="xian">
                                    <option>==请选择==</option>
                                    <?php foreach($xian as $row): ?>
                                        <option <?php echo $row['class_id'] == $cityarr[2] ? 'selected' : '' ?> <?php echo $row['class_id'] ?> value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
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
    $(function(){
        $('#sheng').on('change', function() {
            var class_id = this.value;
            if(class_id == 0)
            {
                $("#shi").html("").html("<option>==请选择==</option>");
                $("#xian").html("").html("<option>==请选择==</option>");

            }else{
                //ajaxgetlistbyclassid
                $.ajax({
                    type:"GET",
                    url: "/address/ajaxgetlistbyclassid?id="+class_id,
                    success: function(data){
                        data = eval(data);
                        $("#shi").html("");
                        var optionstr = "";
                        if(data.length <=1)
                        {
                            optionstr = "<option>==请选择==</option>";
                        }
                        $.each(data, function(i, item) {
                            optionstr+="<option value='"+item.class_id+"'>"+item.class_name+"</option>";
                        });
                        $("#shi").append(optionstr);
                        $("#xian").html("").html("<option>==请选择==</option>");
                    }
                });
            }
        });
        $('#shi').on('change', function() {
            var class_id = this.value;
            $.ajax({
                type:"GET",
                url: "/address/ajaxgetlistbyclassid?id="+class_id,
                success: function(data){
                    data = eval(data);
                    $("#xian").html("");
                    var optionstr = "";
                    if(data.length <=1)
                    {
                        optionstr = "<option>==请选择==</option>";
                    }
                    $.each(data, function(i, item) {
                        optionstr+="<option value='"+item.class_id+"'>"+item.class_name+"</option>";
                    });
                    $("#xian").append(optionstr);
                }
            });
        });
    })
</script>