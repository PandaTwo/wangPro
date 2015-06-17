<form id="tab" action="/sms/postsendsms" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">发送短信</h1>
        </div>
        <div class="main-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">发送短信</a></li>
            </ul>
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <input type="hidden" id="userid" name="id" value="<?php echo isset($memberModel) ? $memberModel['id'] : '' ?>">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="form-group">
                                <label>账户</label>
                                <input name="asdl_id" type="text" value="<?php echo isset($memberModel) ? $memberModel['adsl_id'] : '' ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>姓名</label>
                                <input name="username" type="text" value="<?php echo isset($memberModel) ? $memberModel['username'] : '' ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>手机号码</label>
                                <input name="phoneNumber" type="text" value="<?php echo isset($memberModel) ? $memberModel['phoneNumber'] : '' ?>" class="form-control">
                            </div>
                            <?php foreach($smstemps as $rows): ?>
                                <input type="hidden" name="<?php echo $rows['title'] ?>" id="<?php echo $rows['title'] ?>" value="<?php echo $rows['value'] ?>">
                            <?php endforeach; ?>
                            <div class="form-group">
                                <label>短信模板</label>
                                <select id="tempchoose" name="tempchoose">
                                    <option value="">==请选择==</option>
                                    <?php foreach($smstemps as $rows): ?>
                                        <option value="<?php echo $rows['title'] ?>"><?php echo $rows['remark'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>发送内容</label>
                                <textarea id="remark" name="remark" rows="10" cols="30" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                通用变量:{username}-用户姓名&nbsp; {starttime}-开户日期&nbsp; {endtime}-到期时间&nbsp; {packagename}-套餐名称
                                </div>
                        </div>
                    </div>
                    <div class="btn-toolbar list-toolbar">
                        <button onclick='return checkform()' class="btn btn-primary"><i class="fa fa-save"></i> 确认发送</button>
                    </div>
                </div>
            </div>
            <?php
            $this->load->view('include/content_footer.html');
            ?>
        </div>
    </div>
</form>
<script>

    function checkform()
    {
        if($("#remark").val() == "")
        {
            alert('短信内容不能为空。');
            return false;
        }
        if($("#userid").val() == "")
        {
            alert('用户不存在。');
            return false;
        }
        document.getElementById("tab").submit();
    }

    $(function(){
        $("#tempchoose").change(function(){
            var option = $('option:selected', this).val();
            if(option == "")
            {
                $("#remark").val('');
            }else{
            $("#remark").val($('#'+option).val()) ;
            }
        });
    })
</script>