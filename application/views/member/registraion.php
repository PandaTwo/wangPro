    <div class="content">
        <div class="header">
            <h1 class="page-title">开户登记</h1>
        </div>
        <div class="main-content">

            <div class="row">
                <div class="col-md-4">
                    <br>
                    <form id="tab" action="/member/addregistration" enctype="multipart/form-data"  method="post">
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
                                <select id="packageid" name="packageid" class="form-control" required>
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
                                <select id="sheng" name="sheng">
                                    <option value="0">==请选择==</option>
                                    <?php foreach($firststepaddress as $row): ?>
                                        <option value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select id="shi" name="shi">
                                    <option>==请选择==</option>
                                </select>
                                <select id="xian" name="xian">
                                    <option>==请选择==</option>
                                </select>
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