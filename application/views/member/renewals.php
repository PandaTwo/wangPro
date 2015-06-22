
<div class="content">
    <div class="header">
        <h1 class="page-title">续费打单</h1>
    </div>
    <form action="/member/searchrenewals" method="get">
    <div class="btn-toolbar list-toolbar">
        <span>姓名：<input type="text" name="username" value="<?php echo isset($_REQUEST['username']) ? $_REQUEST['username'] :''  ?>"> </span>
        <span>手机号码：<input type="text" name="phoneNumber" value="<?php echo isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] :''  ?>"></span>
        <span>宽带账号：<input type="text" name="adsl_id" value="<?php echo isset($_REQUEST['adsl_id']) ? $_REQUEST['adsl_id'] :''  ?>"></span>
        <input type="submit"  class="btn btn-primary" value="搜索">
        <div class="btn-group">
        </div>
    </div>
    </form>
    <div class="main-content">
        <div class="row">
            <div class="col-md-8">
                <br>
                <form id="tab" action="/member/postrenewals" enctype="multipart/form-data"  method="post">
                    <input type="hidden" name="id" value="<?php echo $sourceModel['id']; ?>">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <td>账户</td>
                            <td>
                                <input type="text" value="<?php echo $sourceModel['adsl_id']; ?>" name="adsl_id"  class="form-control" >
                            </td>
                        </tr>
                        <tr>
                            <td>密码</td>
                            <td><input type="text" value="<?php echo $sourceModel['adsl_pwd']; ?>" name="adsl_pwd" class="form-control" ></td>
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
                            <td>开户日期</td>
                            <td><input type="text" value="<?php echo date('Y-m-d H:i:s',$sourceModel['start_time']); ?>" name="start_time" class="form-control" style="width: 150px" onFocus="WdatePicker({isShowClear:true,dateFmt:'yyyy-MM-dd'})" ></td>
                        </tr>
                        <tr>
                            <td>结束日期</td>
                            <td><input type="text" value="<?php echo date('Y-m-d H:i:s',$sourceModel['end_time']); ?>" name="end_time" class="form-control" style="width: 150px" onFocus="WdatePicker({isShowClear:true,dateFmt:'yyyy-MM-dd'})" ></td>
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
                            <td>安装地址</td>
                            <td><input type="text" value="<?php echo $sourceModel['address']; ?>" name="address" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>续费套餐</td>
                            <td>
                                <select id="packageid" name="packageid" class="form-control" required>
                                    <?php foreach($packages as $rows): ?>
                                        <option value="<?php echo $rows['id']; ?>" price="<?php echo $rows['Price']; ?>"><?php echo $rows['PackagesName']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>套餐价格</td>
                            <td>
                            <span id="span_price"><?php echo $packages[0]['Price'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>续至日期</td>
                            <td>
                            <input type="text" value="" name="end_time1" class="form-control" style="width: 150px" onFocus="WdatePicker({isShowClear:true,dateFmt:'yyyy-MM-dd'})" >
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> 确认续费并打印</button>
                    </div>
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
        $("#packageid").change(function(){
            var option = $('option:selected', this).attr('Price');
           $("#span_price").html(option) ;
        });
    })
</script>