<div class="content">
    <div class="header">
        <h1 class="page-title">会员列表</h1>
    </div>
    <div class="main-content">
        <form action="/member/" method="get">
        <div class="btn-toolbar list-toolbar">
            <span>
                关键字:<input name="searchKeywords" style="width: 500px;" value="<?php echo isset($_REQUEST['searchKeywords']) ? $_REQUEST['searchKeywords'] : ''; ?>" type="text" >
            </span>
            <input  class="btn btn-primary" type="submit" value="搜索">
            <div class="btn-group">
            </div>
        </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>账号</th>
                <th>密码</th>
                <th>服务状态</th>
                <th>套餐</th>
                <th>开户日期</th>
                <th>续费日期</th>
                <th>到期日期</th>
                <th>姓名</th>
                <th>性别</th>
                <th>身份证</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>安装地址</th>
                <th>设备名称</th>
                <th>机柜</th>
                <th>操作员</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($sourceList['objlist'] as $row):
                ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td><?php echo $row['adsl_id']; ?></td>
                    <td><?php echo $row['adsl_pwd']; ?></td>
                    <td><?php echo $row['serviceSatus']; ?></td>
                    <td><?php echo $row['pName']; ?></td>
                    <td><?php echo date('Y-m-d',intval($row['start_time'])); ?></td>
                    <td><?php echo $row['up_time'] == '' ? '' : date('Y-m-d',intval($row['up_time']));?></td>
                    <td><?php echo date('Y-m-d',intval($row['end_time'])); ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['sex']; ?></td>
                    <td><?php echo $row['cardid']; ?></td>
                    <td><?php echo $row['phoneNumber']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['eName']; ?></td>
                    <td><?php echo $row['cNumber']; ?></td>
                    <td><?php echo $row['updateName']; ?></td>
                    <td>
                        <select id="optionlink" class="optionlink">
                            <option value="#">==请选择操作==</option>
                            <option value="/member/edit?id=<?php echo $row['id']; ?>">修改资料</option>
                            <option value="/member/deletebyid?id=<?php echo $row['id']; ?>">删除会员</option>
                            <option value="/member/timeout?id=<?php echo $row['id']; ?>">带宽到期</option>
                            <option value="/member/renewals?id=<?php echo $row['id']; ?>">带宽续费</option>
                            <option value="/sms/sendsms?id=<?php echo $row['id']; ?>">发送短信</option>
                            <option value="#">查看留言</option>
                        </select>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div style="clear: both;"></div>
        <?php echo $html; ?>
        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>
<script>
    $(function(){
        $('.optionlink').change(function() {
           var val = this.value;
            if(val.indexOf('deletebyid') > -1)
            {
                var res = confirm('确定删除当前会员？');
                if(res)
                {
                    window.location.href = val;
                }else{
                    return;
                }
            }
<<<<<<< HEAD
            if(val.indexOf('timeout') > -1)
            {
                var res = confirm('确定使当前会员到期？');
                if(res)
                {
                    window.location.href = val;
                }else{
                    return;
                }
            }
=======
>>>>>>> origin/master
            window.location.href = val;
        });
    })

</script>