
<div class="content">
    <div class="header">
        <h1 class="page-title">开户交费</h1>
    </div>
    <div class="main-content">

        <div class="row">
            <div class="col-md-8">
                <br>
                <form id="tab" action="/member/addregistraionmoney" enctype="multipart/form-data"  method="post">
                    <input type="hidden" name="id" value="<?php echo $sourceModel['id']; ?>">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <td>账户</td>
                            <td>
                                <input type="text" value="" name="adsl_id" class="form-control" >
                            </td>
                        </tr>
                        <tr>
                            <td>密码</td>
                            <td><input type="text" value="" name="adsl_pwd" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td>服务状态</td>
                            <td>
                                <select name="serviceSatus" class="form-control">
                                    <option value="正常">正常</option>
                                    <option value="暂停">暂停</option>
                                    <option value="到期">到期</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>套餐</td>
                            <td>
                                <select id="packageid" name="packageid" class="form-control" required>
                                    <option value="">==请选择套餐==</option>
                                    <?php foreach($packages as $rows): ?>
                                        <option value="<?php echo $rows['id']; ?>"><?php echo $rows['PackagesName']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>开户日期</td>
                            <td><input type="text" value="<?php echo date('Y-m-d') ?>" name="start_time" class="form-control" style="width: 150px" onFocus="WdatePicker({isShowClear:true,dateFmt:'yyyy-MM-dd'})" ></td>
                        </tr>
                        <tr>
                            <td>结束日期</td>
                            <td><input type="text" value="" id="end_time" name="end_time" class="form-control" style="width: 150px" onFocus="WdatePicker({isShowClear:true,dateFmt:'yyyy-MM-dd'})" ></td>
                        </tr>
                        <tr>
                            <td>姓名</td>
                            <td><input type="text" value="<?php echo $sourceModel['username']; ?>" name="username" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td>性别</td>
                            <td>
                                <select name="sex" class="form-control">
                                    <option <?php echo $sourceModel['sex'] == '男' ? 'selected' :''; ?> value="男">男</option>
                                    <option <?php echo $sourceModel['sex'] == '女' ? 'selected' :''; ?> value="女">女</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>身份证号码</td>
                            <td><input type="text" value="<?php echo $sourceModel['cardid']; ?>" name="cardid" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td>手机</td>
                            <td><input type="text" value="<?php echo $sourceModel['phoneNumber']; ?>" name="phoneNumber" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td>邮箱</td>
                            <td><input type="text" value="<?php echo $sourceModel['email']; ?>" name="email" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td>设备名称</td>
                            <td>
                                <select id="equipmentid" name="equipmentid" class="form-control" required>
                                    <?php foreach($equipments as $rows): ?>
                                        <option value="<?php echo $rows['id']; ?>"><?php echo $rows['equipmentName']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>设备序号</td>
                            <td><input type="text" value="<?php echo $sourceModel['equipment_sn']; ?>" name="equipment_sn" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td>安装地址</td>
                            <td><input type="text" value="<?php echo $sourceModel['address']; ?>" name="address" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td>机柜</td>
                            <td>
                                <select id="cabinetsid" name="cabinetsid" class="form-control" required>
                                    <?php foreach($cabinets as $rows): ?>
                                        <option value="<?php echo $rows['id']; ?>"><?php echo $rows['cabinetsNumber']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="btn-toolbar list-toolbar">
                        <a href="/member/registraionlist" class="btn btn-primary"> 返回列表</a>
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> 保存并发送工单</button>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                <img src="/static/uploads/<?php echo $sourceModel['cardpic']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="/static/uploads/<?php echo $sourceModel['cardpic1']; ?>" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>
<input type="hidden" id="oneyear" value="<?php echo  date('Y-m-d',strtotime('+1 years',time()))   ?>">
<input type="hidden" id="oneMonth" value="<?php echo  date('Y-m-d',strtotime('+1 months',time()))   ?>">
<input type="hidden" id="threeMonth" value="<?php echo  date('Y-m-d',strtotime('+3 months',time()))   ?>">
<script>
    $('#tab').validator();

    $(function(){

        $('#packageid').on('change', function() {
            var opText = $("#packageid option:selected").text();
            if(opText.indexOf('年') > -1)
            {
                $('#end_time').val($('#oneyear').val());
            }
            if(opText.indexOf('月') > -1)
            {
                $('#end_time').val($('#oneMonth').val());
            }
            if(opText.indexOf('季') > -1)
            {
                $('#end_time').val($('#threeMonth').val());
            }
        });

    })
</script>